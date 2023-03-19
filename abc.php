<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock App</title>
</head>
<body>

    <script src="https://sdk.stringee.com/webrtc/1.0.4/stringee-webrtc.js"></script>
    <script>
        var stringeeClient = new StringeeClient();
        stringeeClient.connect(projectId, accessToken);
        var stringeeCall = new StringeeCall(stringeeClient);
        stringeeCall.setVideoCall(true);
        stringeeCall.on('addlocalstream', function (stream) {
            // Handle local stream
        });
        stringeeCall.on('addremotestream', function (stream) {
            // Handle remote stream
        });

        stringeeCall.makeCall(from, to, null);

        var localVideo = document.createElement('video');
        localVideo.autoplay = true;
        var remoteVideo = document.createElement('video');
        remoteVideo.autoplay = true;

        stringeeCall.renderLocalView(localVideo);
        stringeeCall.renderRemoteView(remoteVideo);

    </script>
</body>
</html>