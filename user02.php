<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illusionist</title>
    <link rel="icon" href="./assets/img/logo.png">

    <!-- CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- css for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css for font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/headernfooter.css">
    <link rel="stylesheet" href="./assets/css/game.css">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <style>
        #video-container {
            display: flex;
            justify-content: flex-start;
            flex-direction: column;
            position: absolute;
            right: 0;
            bottom: 0;
            margin: auto;
            width: 200px;
        }

        video {
            background: #22242b;
            height: 120px;
        }

        #localVideo {
            /* position: absolute;
            top: 0;
            right: 0; */
            z-index: 10;
            background: #333;
        }

        #remoteVideo {
            width: 100%;
        }

        #action-buttons {
            margin: auto;
            text-align: center;
        }

        .hidden-first {
            display: none;
        }

        iframe {
            width: 100%;
            height: calc(87vh - 114px);
            border-radius: 0 0 0 16px;
        }
    </style>
</head>

<body>
    <!-- Header section -->
    <?php
    include('./ex_header.php')
    ?>

    <div class="container">
        <!-- <div class="row">
            <div class="col" id="action-buttons">
                <button id="callButton" class="btn btn-success">Call</button>
                <button id="answerCallButton" class="btn btn-info hidden-first">Answer Call</button>
                <button id="rejectCallButton" class="btn btn-warning hidden-first">Reject Call</button>
                <button id="endCallButton" class="btn btn-danger hidden-first">End Call</button>
            </div>
        </div> -->
    </div>


    <script src="js/lib/jquery.js"></script>
    <script src="js/lib/socket.io-2.2.0.js"></script>
    <script src="js/StringeeSDK-1.5.10.js"></script>
    <script>
        var token = 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSy4wLlZTNnNVS1I3NmEwRkhwTzF1ZHU0MG1aRmVod1dpRVd3LTE2NzkxNzkwNTAiLCJpc3MiOiJTSy4wLlZTNnNVS1I3NmEwRkhwTzF1ZHU0MG1aRmVod1dpRVd3IiwiZXhwIjoxNjgxNzcxMDUwLCJ1c2VySWQiOiJ1c2VyMDEifQ.I5zhugqzj3qISbJOJyF9jHjDB6gOUE3bjVC910dbhOw';
        var callerId = 'user01';
        var calleeId = 'user02';
    </script>
    <script src="js/code.js"></script>

    <!-- Main content -->
    <main class="main">
        <section class="header">
            <div class="header--left">
                <h1>Colonist game</h1>
            </div>
            <div class="header--right">
                <button id="answerCallButton" class="btn btn-info hidden-first">Answer Call</button>
                <button id="rejectCallButton" class="btn btn-info hidden-first">Reject Call</button>
                <button id="endCallButton" class="btn btn-danger hidden-first">End Call</button>
                <i id="callButton" class="fa-solid fa-video"></i>
                <i class="fa-solid fa-microphone"></i>
                <i class="fa-solid fa-gear"></i>
            </div>
        </section>

        <div class="game">
            <div class="game__display">
                <div class="round-info">
                    <div class="round-info__team">
                        <img src="./assets/img/avt3.png" alt="" class="team-A__avt">
                        <img src="./assets/img/avt4.png" alt="" class="team-A__avt">
                    </div>
                    <h2>ROUND 02</h2>
                    <div class="round-info__team">
                        <i class="fa-solid fa-user-plus"></i>
                        <img src="./assets/img/avt2.png" alt="" class="team-A__avt">
                        <img src="./assets/img/avt1.png" alt="" class="team-A__avt">
                    </div>
                </div>

                <div id="video-container">
                    <video id="remoteVideo" autoplay></video>
                    <video id="localVideo" autoplay muted></video>
                </div>
                <!-- display game here -->
                <iframe src="
                https://colonist.io/vi/?fbclid=IwAR2GV8b7yq9KtV07HWaKV-eqs_zuAilp-Qb21V8GSXJZe2lLJvhbPaC3DpE
                " frameborder="0"></iframe>
            </div>
            <div class="game__chat-box">
                <div class="game__chat-box__content">
                    <div class="game__chat-box__msg right">
                        <img src="./assets/img/avt3.png" alt="">
                        <p>Hello bro :))</p>
                    </div>
                    <div class="game__chat-box__msg left">
                        <img src="./assets/img/avt4.png" alt="">
                        <p>How r u doing so far?</p>
                    </div>
                    <div class="game__chat-box__msg left">
                        <img src="./assets/img/avt2.png" alt="">
                        <p>Ayyo</p>
                    </div>
                </div>
                <form class="game__chat-box__form">
                    <input type="text" class="game__chat-box__form-field" placeholder="Enter your message">
                    <!-- <input type="submit" value="Send"> -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                </form>
            </div>
        </div>
    </main>

    <!-- JS Code -->
    <script>
        document.querySelector('.game__chat-box__form').onclick = function() {
            var content = document.querySelector('.game__chat-box__form-field').value;
            // console.log(content);
            if (!content) {
                return 0;
            }
            document.querySelector('.game__chat-box__content').innerHTML +=
                `<div class="game__chat-box__msg right" style="margin-left: 15%">
                        <img src="./assets/img/avt2.png" alt="">
                        <p>${content}</p>
                    </div>`;
            document.querySelector('.game__chat-box__form').reset();
        }
    </script>

    <script>
        document.querySelector('#localVideo').onclick = function() {

        }
    </script>

    <script>
        var token = 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTSy4wLlZTNnNVS1I3NmEwRkhwTzF1ZHU0MG1aRmVod1dpRVd3LTE2NzkxNzkxMzkiLCJpc3MiOiJTSy4wLlZTNnNVS1I3NmEwRkhwTzF1ZHU0MG1aRmVod1dpRVd3IiwiZXhwIjoxNjgxNzcxMTM5LCJ1c2VySWQiOiJ1c2VyMDIifQ.AaR_6f48bgtlB4pUerEJadEOv6DRiXDnx5H375EzmPA';
        var callerId = 'user02';
        var calleeId = 'user01';
    </script>

    <script>
        document.querySelector('.minimize-chatbox-ic').onclick = function() {
            document.querySelector('.game__chat-box').style.width = "0%";
            document.querySelector('.game__display').style.width = "100%";
            this.style.display = "none";
            document.querySelector('.expand-chatbox-ic').style.display = "block";
        }

        document.querySelector('.expand-chatbox-ic').onclick = function() {
            document.querySelector('.game__chat-box').style.width = "23%";
            document.querySelector('.game__chat-box').style.transition = "0.2s";
            document.querySelector('.game__display').style.width = "77%";
            this.style.display = "none";
            document.querySelector('.minimize-chatbox-ic').style.display = "block";
        }
    </script>
</body>

</html>