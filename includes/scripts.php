<?php if($_SERVER['SERVER_NAME'] == 'jal.dev'):
// SANDBOX ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script src="js/ba-throttle-debounce.min.js"></script>
    <script src="js/touchSwipe.min.js"></script>
    <script src="js/scripts.js"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-28297381-1', 'jalproductions.co.uk');
      ga('send', 'pageview');
    </script>

<?php else:
// LIVE ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script src="build/ba-throttle-debounce.min.js"></script>
    <script src="build/touchSwipe.min.js"></script>
    <script src="build/scripts.min.js"></script>

    <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-28297381-1', 'jalproductions.co.uk');ga('send', 'pageview');</script>

<?php endif; ?>