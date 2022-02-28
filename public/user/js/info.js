$("#uploadImage").change(function() {
    filename = this.files[0].name;
    console.log(filename);
});

$("#img_cmnd_truoc").change(function() {
    filename = this.files[0].name;
    console.log(filename);
});

$("#img_cmnd_sau").change(function() {
    filename = this.files[0].name;
    console.log(filename);
});

window.onload = function() {
  if (window.File && window.FileList && window.FileReader) {
    var filesInput = document.getElementById("uploadImage");
    filesInput.addEventListener("change", function(event) {
      var files = event.target.files;
      var output = document.getElementById("result");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          var div = document.createElement("div");
          div.innerHTML = "<img width='100%' class='thumbnail' src='" + picFile.result + "'" +
            "title='" + picFile.name + "'/>";
          output.insertBefore(div, null);
          document.getElementById("label_img").style.display = "none";
        });        
        picReader.readAsDataURL(file);
      }
    });
  }
}

function addListener1(event, obj, fn) {
    if (obj.addEventListener) {
        obj.addEventListener(event, fn, false);   // modern browsers
    } else {
        obj.attachEvent("on"+event, fn);          // older versions of IE
    }
}

addListener('load', window, function() {
  if (window.File && window.FileList && window.FileReader) {
    var filesInput = document.getElementById("img_cmnd_truoc");
    filesInput.addEventListener("change", function(event) {
      var files = event.target.files;
      var output = document.getElementById("result_cmnd_truoc");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          var div = document.createElement("div");
          div.innerHTML = "<img width='100%' src='" + picFile.result + "'" +
            "title='" + picFile.name + "'/>";
          output.insertBefore(div, null);
          document.getElementById("label_cmnd_truoc").style.display = "none";
        });        
        picReader.readAsDataURL(file);
      }
    });
  }
});

function addListener(event, obj, fn) {
    if (obj.addEventListener) {
        obj.addEventListener(event, fn, false);   // modern browsers
    } else {
        obj.attachEvent("on"+event, fn);          // older versions of IE
    }
}

addListener('load', window, function() {
    if (window.File && window.FileList && window.FileReader) {
      var filesInput = document.getElementById("img_cmnd_sau");
      filesInput.addEventListener("change", function(event) {
        var files = event.target.files;
        var output = document.getElementById("result_cmnd_sau");
        for (var i = 0; i < files.length; i++) {
          var file = files[i];
          if (!file.type.match('image'))
            continue;
          var picReader = new FileReader();
          picReader.addEventListener("load", function(event) {
            var picFile = event.target;
            var div = document.createElement("div");
            div.innerHTML = "<img width='100%' src='" + picFile.result + "'" +
              "title='" + picFile.name + "'/>";
            output.insertBefore(div, null);
            document.getElementById("label_cmnd_sau").style.display = "none";
          });        
          picReader.readAsDataURL(file);
        }
      });
    }
  });