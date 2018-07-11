const medias = {audio : false, video : {
        facingMode : {
          exact : "environment"
        }
      }},
      video  = document.getElementById("video"),
      canvas = document.getElementById("canvas"),
      ctx    = canvas.getContext("2d");

let imgData, data, ave;

navigator.getUserMedia(medias, successCallback, errorCallback);

requestAnimationFrame(draw);

function successCallback(stream) {
  video.srcObject = stream;
};

function errorCallback(err) {
  alert(err);
};

function draw() {
  canvas.width  = window.innerWidth;
  canvas.height = window.innerHeight;
  ctx.drawImage(video, 0, 0);

  imgData = ctx.getImageData(0, 0, canvas.width,  canvas.height);
    data = imgData.data;

    for (let i = 0; i < data.length; i += 4) {
      ave = (data[i + 0] + data[i + 1] + data[i + 2]) / 3;

      data[i + 0] = 
      data[i + 1] = 
      data[i + 2] = (ave > 255 / 2) ? 255 : (ave > 255 / 4) ? 127 : 0;
      data[i + 3] = 255;
    }

  ctx.putImageData(imgData, 0, 0);
  requestAnimationFrame(draw);
}

$('.capture').on('click',function(){
  // 保存のためのaタグを用意
  alert("発火しました")
  var paragraph = $('<a id="download" href="#", download="0.jpg" >Download</a>');
  $('body').append(paragraph);

  // Canvasからデータを抽出
  var type = 'image/png';
  var canvas = document.getElementById('canvas_id');
  var data = canvas.toDataURL(type);
  var bin = atob(data.split(',')[1]);
  var buffer = new Uint8Array(bin.length);

  for (var i = 0; i < bin.length; i++) {
    buffer[i] = bin.charCodeAt(i);
  }

  // 画像データをblob使ってurl化する(?)
  var blob = new Blob([buffer.buffer], {type: type});
  var url = window.URL.createObjectURL(blob);

  // blobでurl化した画像データをaタグのクリックによりDLできるようにする
  var downloader = $('#download');
  downloader.attr('href', url);
  downloader.attr('download', currentNum+'.png');

  // クリックイベントを発火させる
  document.getElementById('download').click();
});