<h2>About</h2>
<div class="centre" itemscope itemtype="http://data-vocabulary.org/Person">
    <div class="col col-p" id="face">
        <img src="img/james.jpg" class="circle" alt="James Alexander Lee" itemprop="photo"/>

        <div id="me">
            <?php
                $birthDate = '03/03/1992';
                $birthDate = explode('/', $birthDate);
                $age = (date('md', date('U', mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date('md') ? ((date('Y')-$birthDate[2])-1):(date('Y')-$birthDate[2]));
            ?>

            <h3>Me</h3>
            <p>Hey! My name is <span itemprop="name">James Alexander Lee</span>, I'm <?= $age; ?> years old and I live in <span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address"><span itemprop="region">Kent</span>, <span itemprop="country-name">UK</span></span>.</p>
            <p><span itemprop="affiliation">JaL Productions</span> is my portfolio of multimedia work.</p>
            <p>I started JaL Productions back in 2005 after being taught Flash in school and being inspired into the realm of digital arts. From then on I have been creating a variety of multimedia content.</p>
            <p>Nowadays I specialise in full-stack web development.</p>
        </div>

        <div id="lastfm">
            <h3>What I'm Listening To</h3>
            <?php
                $url  = 'https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=jamesl1001&api_key=547536d9928038ef6de3642606f6557a';
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_URL => $url,
                    CURLOPT_USERAGENT => 'JaL-User-Agent'));
                $feed   = simplexml_load_string(curl_exec($curl));
                $track  = $feed->recenttracks->track[0];
                $artist = (string)$track->artist;
                $name   = (string)$track->name;
                $album  = (string)$track->album;
                $image  = $track->image[1];
            ?>

            <a href="https://www.last.fm/user/JamesL1001" target="_blank">
                <div class="track">
                    <img src="<?= $image; ?>" class="track-image"/>
                    <p>
                        <?php
                        if(!empty($artist)) { echo "<span class=\"track-artist\">$artist</span> &mdash; "; }
                        if(!empty($album))  { echo "<span class=\"track-album\">$album</span> &mdash; "; }
                        if(!empty($name))   { echo "<span class=\"track-name\"><strong>$name</strong></span>"; }
                        ?>
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="col col-s">
        <div id="university">
            <h3>University</h3>
            <p>I graduated from the <span itemprop="alumniOf">University of Kent</span>, Canterbury in 2014 with a First Class Honours degree in BSc (Hons) Multimedia Technology and Design with a Year in Industry.</p>
            <p>I studied a wide range of modules including web design, photography, film, 2D animation, 3D modelling, visual effects, Android development and programming in several languages.</p>
            <p>I am currently continuing my education at the University of Kent studying for a PhD in Computer Science and Psychology.</p>
        </div>

        <div id="work">
            <h3>Industry Experience</h3>
            <p>Between the second and third year of university, I took an industrial placement year at the BBC as a Web Developer for the World Service.</p>
            <p>During my time there I worked on an <a href="web?site=bbcwsolympics">Olympics special</a> and the <a href="web?site=bbcwsresponsive">Responsive project</a> to migrate the World Service language sites to responsive web design.</p>
            <p>I also have experience with client-based work, building websites and web apps for restaurants, transport services, charities and start-ups in the fashion and housing industries. For more details about each of these projects, go to <a href="web">Web</a>.</p>
        </div>
    </div>

    <hr>

    <div class="col col-p" id="languages">
        <h3>Languages</h3>
        <table>
            <tr><td>HTML5 &amp; CSS3</td></tr>
            <tr><td>JavaScript &amp; jQuery</td></tr>
            <tr><td>PHP</td></tr>
            <tr><td>Sass</td></tr>
            <tr><td>Android</td></tr>
            <tr><td>Java</td></tr>
            <tr><td>Ruby</td></tr>
            <tr><td>ActionScript 3.0 &amp; 2.0</td></tr>
            <tr><td>R</td></tr>
            <tr><td>C++</td></tr>
            <tr><td>C#</td></tr>
            <tr><td>Visual Basic</td></tr>
        </table>
    </div>

    <div class="col col-s" id="software">
        <h3>Software</h3>
        <table>
            <tr><td>Photoshop, Dreamweaver, Flash, After Effects, Premiere Pro</td></tr>
            <tr><td>MySQL</td></tr>
            <tr><td>Git</td></tr>
            <tr><td>Grunt</td></tr>
            <tr><td>Autodesk 3DS Max</td></tr>
            <tr><td>NextLimit Realflow</td></tr>
            <tr><td>WordPress</td></tr>
            <tr><td>Swift 3D</td></tr>
            <tr><td>FL Studio</td></tr>
            <tr><td>Android Studio, Eclipse</td></tr>
            <tr><td>Microsoft Visual Studio</td></tr>
            <tr><td>Cucumber, QUnit, Jasmine</td></tr>
        </table>
    </div>
</div>