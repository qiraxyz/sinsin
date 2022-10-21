<?php 
  include 'koneksi.php';
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- link css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/styles.css">
    <style><?php include 'styles.css' ?></style>
    <!-- title -->
    <title>Lobby main</title>
  </head>
  <body>

    <div class="card" id="yah">
      <div class="card-body">
      <label id="juduls">Lobby Game</label>
          <hr>
    <div id="container-username" class="container-username">
          <form action="" onsubmit="return false">
          <label>Username :</label>
          <div class="form-group">
          <input type="text" class="form-control bg-black bg-opacity-40 text-white" id="username" class="sinsi" value="<?php echo $_SESSION['username'] ?>" onkeyup="ifstartchangename()" placeholder="Masukkan Username">
          <a id="pesan_failed1">Username cannot change!</a>
          </div>
                  <div class="form-group">
                <label>Pick the Obstacle Color :</label>
                  <input type="color" class="" id="colorss">
                </div>
                  <div class="form-group">
                <label>Pick the Character Color :</label>
                  <input type="color" class="" id="colors">
                  <p id="ambil-color"></p>
                </div>
                <button id="button-klick" type="submit" class="btn btn-login btn-block btn-success" onclick="startGame()">Start Game</button>
          </form>
                <div id="logouts"><a href="index.php"><button class="btn btn-login btn-block btn-success">Log Out</button></a></div>
    </div>
    <div class="container-c" id="container-c">
      <div style="position: absolute;">
          <div id="myfilter" class="myfilter"></div>          
          <div id="canvascontainer">
            <!-- <label for="" style="color: #52b3ec; position: absolute; left: 0%;">Username : <a id="namesss"></a></label> -->
          </div>
          <div id="myrestartbutton"><button onclick="restartGame()">Try Again</button></div>

          <div id="myrestartbuttons"><button onclick="myFunction()">Leave</button></div>

          </div>
          <!-- let inps = document.getElementById('username').value
          as.innerText = inps -->
      </div>
      </div>
    </div>
  </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>

  function ifstartchangename(){
        let username = document.getElementById('username')
        let warn = document.getElementById('pesan_failed1')
        let colors  = document.getElementById('colors')
        let colorss = document.getElementById('colorss')

        if (username.value && username.value != "<?php echo $_SESSION['username'] ?>") {
            warn.style.display = "block"
        } else{
            warn.style.display = "none"
        }

}       
      

  

var myGamePiece;
var myObstacles = [];
var myScore;
var myuser;

function restartGame() {
    startGame()
    
}

function startGame() {
    let juduls = document.getElementById('juduls')
    let register = document.getElementById('container-username')
    let logins = document.getElementById('container-c')
    let restart1 = document.getElementById('myrestartbutton')
    document.getElementById('myrestartbuttons').style.display = "none"
    restart1.style.display = "none"
    juduls.innerText = "Game Simple"
    register.style.display = "none"
    logins.style.display = "block"
    myGamePiece = new component(30, 30, document.getElementById('colors').value, 10, 120);
    myScore = new component("24px", "Consolas", "white", 460, 40, "text");
    myuser = new component("20px", "Consolas", "blue", 20, 20, "text");
    myGameArea.start();
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 600;
        this.canvas.height = 270;
        this.context = this.canvas.getContext("2d");
        document.getElementById('canvascontainer').insertBefore(this.canvas, document.getElementById('canvascontainer').childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 20);
        window.addEventListener('keydown', function (e) {
            myGameArea.key = e.keyCode;
        })
        window.addEventListener('keyup', function (e) {
            myGameArea.key = false;
        })
        },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    stop : function() {
        clearInterval(this.interval);
    }
}

function component(width, height, color, x, y, type) {
    this.type = type;
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;    
    this.x = x;
    this.y = y;    
    this.update = function() {
        ctx = myGameArea.context;
        if (this.type == "text") {
            ctx.font = this.width + " " + this.height;
            ctx.fillStyle = color;
            ctx.fillText(this.text, this.x, this.y);
        } else {
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;        
    }
    this.crashWith = function(otherobj) {
        var myleft = this.x;
        var myright = this.x + (this.width);
        var mytop = this.y;
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
            crash = false;
            
        }
        return crash;
    }
}

function updateGameArea() {
    var x, height, gap, minHeight, maxHeight, minGap, maxGap;
    for (i = 0; i < myObstacles.length; i += 1) {
        if (myGamePiece.crashWith(myObstacles[i])) {
            myGameArea.stop();
            document.getElementById("myfilter").style.display = "block";
            document.getElementById("myrestartbutton").style.display = "block";
            document.getElementById('myrestartbuttons').style.display = "block"
            return;
        } 
    }
    myGameArea.clear();
    myGameArea.frameNo += 1;
    if (myGameArea.frameNo == 1 || everyinterval(150)) {
        x = myGameArea.canvas.width;
        minHeight = 20;
        maxHeight = 200;
        height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
        minGap = 50;
        maxGap = 200;
        gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
        myObstacles.push(new component(10, height, document.getElementById('colorss').value, x, 0));
        myObstacles.push(new component(10, x - height - gap, document.getElementById('colorss').value, x, height + gap));
    }
    for (i = 0; i < myObstacles.length; i += 1) {
        myObstacles[i].speedX = -2;
        myObstacles[i].newPos();
        myObstacles[i].update();
    }
    myScore.text="SCORE: " + myGameArea.frameNo;
    myScore.update();
    myuser.text="username:" + "<?php echo $_SESSION['username']?>"  + " ID:" + "<?php echo $_SESSION['id'] ?>" ;
    myuser.update();
    
    if (myGameArea.key && myGameArea.key == 83) {myGamePiece.speedX = -1; }
    if (myGameArea.key && myGameArea.key == 70) {myGamePiece.speedX = 1; }
    if (myGameArea.key && myGameArea.key == 69) {myGamePiece.speedY = -1; }
    if (myGameArea.key && myGameArea.key == 68) {myGamePiece.speedY = 1; }
    myGamePiece.newPos();    
    myGamePiece.update();
}

function everyinterval(n) {
    if ((myGameArea.frameNo / n) % 0.5 == 0) {return true;}
    return false;
}

function myFunction(){                                 
        location.reload()
    }

    </script>

  </body>
</html>