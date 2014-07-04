<!DOCTYPE HTML>
<html>
<head>
    <?php include('includes/head.php'); ?>
</head>
<body class="<?php include('includes/bodyclass.php'); ?>">
    <?php include('includes/header.php'); ?>
    
    <div id="viewport">
        <div id="page">
            <h2>Programming</h2>
            <div class="centre">
                <div class="col col-p">
                    <h3>Web</h3>

                    <p>I have expert knowledge of HTML and CSS and work with new <strong>HTML5</strong> and <strong>CSS3</strong> standards to produce W3C valid, SEO-friendly, semantically correct markup.</p>
                    <p>I make use of <strong>JavaScript</strong> and the <strong>jQuery</strong> library to spruce up my designs, add interactivity and accomplish more complex tasks with <a href="web">my web projects</a>.</p>
                    <p>I use <strong>PHP</strong> primarily to talk to a <strong>MySQL</strong> database to load content dynamically into my sites. Databases are a fantastic way to easily update content without having to go into the code.</p>
                    <p>I also use quite a bit of <strong>AJAX</strong> for asynchronous requests.</p>
                    <p>From working at the BBC, I have been introduced to many new web-related things: <strong>Git</strong>, automated testing with <strong>Cucumber</strong>, <strong>Sass</strong>, <strong>Ruby</strong>, <strong>Agile methodologies</strong>, <strong>BDD</strong> - the list goes on! <a href="http://blog.jalproductions.co.uk/" target="_blank">See my blog for more info.</a></p>
                </div>

                <hr class="col-divider">

                <div id="github" class="col col-s">
                    <h3><a href="https://github.com/jamesl1001" target="_blank">GitHub</a> &mdash; my open source projects</h3>

                    <table>
                    <?php
                        $url  = 'https://api.github.com/users/jamesl1001/repos';
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_RETURNTRANSFER => 1,
                            CURLOPT_URL => $url,
                            CURLOPT_USERAGENT => 'JaL-User-Agent'));
                        $repo = json_decode(curl_exec($curl));

                        for($i = 0; $i < count($repo); $i++):
                            if($repo[$i]->fork == true) { continue; }
                            $name = $repo[$i]->name;
                            $url  = $repo[$i]->html_url;
                            $desc = $repo[$i]->description;
                    ?>
                        <tr>
                            <td><a href="<?= $url; ?>" target="_blank"><?= $name; ?></a> &mdash; <?= $desc; ?></td>
                        </tr>
                    <?php endfor; ?>
                    </table>
                </div>

                <hr>

                <div class="col col-p">
                    <h3>Scrapbook</h3>
                    <p>This is my <a href="http://blog.jalproductions.co.uk/category/scrapbook/" target="_blank">scrapbook</a> of little code snippets I have produced and cool things I have discovered.</p>
                </div>

                <hr class="col-divider">

                <div class="col col-s">
                    <h3>Flash ActionScript</h3>

                    <p>I worked with <strong>ActionScript 2.0</strong> since 2005. I first produced a maths game for children as part of my school curriculum. From then onwards I produced my own <a href="flash">games and animations</a> as a hobby until 2009.</p>
                    <p>In my second year of university I learnt <strong>ActionScript 3.0</strong> and developed a <a href="projects/DigitalPortfolio" target="_blank">portfolio showcasing my work</a>.</p>
                    <p>I also produced my portfolio for applying to universities in Flash using ActionScript 2.0. <a href="http://jlport.tk/" target="_blank">Take a look</a>.</p>
                </div>

                <hr>

                <div class="col col-p">
                    <h3>Others</h3>

                    <p><strong>Visual Basic</strong> was one of the first programming languages I learnt, mainly because it was easy to understand and ran on Windows machines without needing a compiler.</p>
                    <p>I learnt to write small programs making use of the SendKeys command to automate keypresses and build macros.</p>
                    <p>Learning <strong>C++</strong> was part of my first year at university. I learnt from the basics of basic arithmetic up to our final project which was to produce a cypher program.</p>
                    <p><strong>Java</strong> was also part of my first year at university. I created basic applications which drew out shapes and allowed user interaction, followed by applets running in an internet browser.</p>
                    <p>Software Development in my second year taught me basic OOP principles and how to write simple <strong>C#</strong> Windows applications.</p>
                </div>

                <hr class="col-divider">

                <div class="col col-s">
                    <p id="good_code">Good code works, great code is invisible.</p>
                </div>
            </div>
        </div>

        <?php include('includes/menu.php'); ?>
    </div>

    <?php include('includes/scripts.php'); ?>
</body>
</html>