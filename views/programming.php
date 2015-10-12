<h2>Programming</h2>
<div class="centre">
    <div class="col col-p">
        <h3>Web</h3>

        <p>My forte is in LAMP stack web development.</p>
        <p>I am proficient in HTML, CSS, Javascript, PHP and MySQL.</p>
        <p>Coming from a visually-oriented background, I have a keen eye for design and have a good understanding of UX and UI.</p>
        <p>I also have strengths in front-end performance, SEO and semantics.</p>
        <p>For my latest personal, industrial and freelance work, please go to <a href="web">my web projects</a>.</p>
    </div>

    <hr class="col-divider">

    <div id="github" class="col col-s">
        <h3><a href="https://github.com/jamesl1001" target="_blank">GitHub</a> &mdash; my open source projects</h3>

        <table>
        <?php
            $key  = file_get_contents('./php/gh.php');
            $url  = "https://api.github.com/users/jamesl1001/repos?access_token=$key";
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
        <h3>Flash / ActionScript</h3>

        <p>I worked with <strong>ActionScript 2.0</strong> since 2005. I first produced a maths game for children as part of my school curriculum. From then onwards I produced my own <a href="flash">games and animations</a> as a hobby until 2009.</p>
        <p>In my second year of university I learnt <strong>ActionScript 3.0</strong> and developed a <a href="projects/DigitalPortfolio" target="_blank">portfolio showcasing my work</a>.</p>
        <p>I also produced my portfolio for applying to universities in Flash using ActionScript 2.0. <a href="projects/PreUniPortfolio.swf" target="_blank">Take a look</a>.</p>
    </div>

    <hr class="col-divider">

    <div class="col col-s">
        <h3>Further Experience</h3>

        <p><strong>Visual Basic</strong> was one of the first programming languages I learnt, mainly because it was easy to understand and ran on Windows machines without needing a compiler.</p>
        <p>I learnt to write small programs making use of the SendKeys command to automate keypresses and build macros.</p>
        <p>Learning <strong>C++</strong> was part of my first year at university. I learnt from the basics of basic arithmetic up to our final project which was to produce a cypher program.</p>
        <p><strong>Java</strong> was also part of my first year at university. I created basic applications which drew out shapes and allowed user interaction, followed by applets running in an internet browser.</p>
        <p>Software Development in my second year taught me basic OOP principles and how to write simple <strong>C#</strong> Windows applications.</p>
    </div>
</div>