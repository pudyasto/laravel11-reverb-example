<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Reverb</title>
    @vite('resources/js/app.js')
    <script type="module">
        Echo.channel('all')
        .listen('.testevent.sent', (e) => {
            console.log(e);
            setEvent(e)
        });

        function setEvent(event){
            var monit = document.getElementById("event-monitor");
            var li = document.createElement("li");
            li.appendChild(document.createTextNode(event));
            monit.appendChild(li);
        }
    </script>
</head>

<body>
    <h3>Event Listener :</h3>
    <ul id="event-monitor"></ul>
</body>

</html>
