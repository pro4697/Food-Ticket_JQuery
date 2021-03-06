
var audio = new Audio('beep.mp3');
var audio_err = new Audio('error.mp3');

var master = false;

function master_toggle() {
    if (!master) {
        $("#state").css("color", "red");
        $("#state").css("right", "10px");
        document.getElementById("state").innerHTML = "Master Key ON";
        master = true;
    }
    else {
        $("#state").css("color", "black");
        $("#state").css("right", "40px");
        document.getElementById("state").innerHTML = "OFF";
        master = false;
    }
}

$("input[type='checkbox']").click(function () { master_toggle(); });

function delay(gap) { /* gap is in millisecs */
    var then, now;
    then = new Date().getTime();
    now = then;

    while ((now - then) < gap)
        now = new Date().getTime();
}

function utf8_decode(str_data) {
    // UTF-8로 인코딩 된 ISO-8859-1 문자를 단일 바이트 ISO-8859-1로 변환합니다. 
    var string = "", i = 0, c = c1 = c2 = 0;
    while (i < str_data.length) {
        c = str_data.charCodeAt(i);
        if (c < 128) {
            string += String.fromCharCode(c);
            i++;
        } else if ((c > 191) && (c < 224)) {
            c2 = str_data.charCodeAt(i + 1);
            string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
            i += 2;
        } else {
            c2 = str_data.charCodeAt(i + 1);
            c3 = str_data.charCodeAt(i + 2);
            string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }
    }
    return string;
}

var app = new Vue({
    el: '#app',
    data: {
        scanner: null,
        activeCameraId: null,
        cameras: [],
        scans: []
    },
    mounted: function () {
        var self = this;
        self.scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5 });
        self.scanner.addListener('scan', function (content, image) {
            content = utf8_decode(content);
            var res = content.split('-');
            var err = "유효하지 않은 식권입니다.";
            var key = { id: res[0], name: res[1], value: res[2], table: res[3], master: master };
            $.ajax({
                url: "qr_check.php",
                method: "post",
                data: { key: JSON.stringify(key) },
                dataType: "text",
                success: function (res) {
                    if (res === "true") {
                        if (master)
                            $("input[type='checkbox']").click();
                        audio.play();
                        self.scans.unshift({ date: +(Date.now()), content: key.name });
                    }
                    else if (res === "false") {
                        audio_err.play();
                        self.scans.unshift({ date: +(Date.now()), content: err });
                    }
                    else if (res === "not_today") {
                        audio_err.play();
                        self.scans.unshift({ date: +(Date.now()), content: "오늘은 사용할 수 없습니다." });
                    }
                }
            });
            delay(2500);
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            self.cameras = cameras;
            if (cameras.length > 0) {
                self.activeCameraId = cameras[0].id;
                self.scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    },
    methods: {
        formatName: function (name) {
            return name || '(unknown)';
        },
        selectCamera: function (camera) {
            this.activeCameraId = camera.id;
            this.scanner.start(camera);
        }
    }
});