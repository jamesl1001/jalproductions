<h2>Web</h2>
<div class="centre">
    <?php
        $subsection = (isset($_GET['subsection']) ? $_GET['subsection'] : '');
        $site       = (isset($_GET['site']) ? $_GET['site'] : '');
        $feed       = simplexml_load_file(__DIR__ . '/web.xml');
        $item       = $feed->xpath("//item[@short='$site']");
        $newer      = $feed->xpath("//item[@short='$site']/preceding-sibling::*[1]");
        $older      = $feed->xpath("//item[@short='$site']/following-sibling::*[1]");

        if(!empty($item)) {
            // Single item
            getData($item);
    ?>
        <div id="web_navigation">
            <?php if(!empty($newer)): $newerShort = $newer[0]->attributes()->short; ?>
                <a href="web?site=<?= $newerShort; ?>"><div class="button button-half web_navigation_button" id="web_newer">Newer</div></a>
            <?php endif; ?>
            <?php if(!empty($older)): $olderShort = $older[0]->attributes()->short; ?>
                <a href="web?site=<?= $olderShort; ?>"><div class="button button-half web_navigation_button" id="web_older">Older</div></a>
            <?php endif; ?>
        </div>

        <div class="web_project" id="<?= $short; ?>">
            <div class="col col-p">
                <h3><?= $title; ?> <sup><?= $status; ?></sup></h3>
                <?= $urlOutput; ?>
                <h4>Client: <small><?= $client; ?></small></h4>
                <h4>Brief:</h4>
                <?= $brief; ?>
                <h4>Technologies used:</h4>
                <?= $techused; ?>
            </div>
            <div class="col col-s">
                <img src="<?= $image; ?>" alt="<?= $title; ?>" class="web_image"/>
            </div>
        </div>
    <?php
        } else { ?>

    <div class="col col-p">
        <a href="web?subsection=bbc"><div class="button web_subsection"><strong>BBC</strong><p>BBC projects during my placement year</p></div></a>
        <a href="web?subsection=precisepixels"><div class="button web_subsection"><strong>Precise Pixels</strong><p>Client projects by Precise Pixels</p></div></a>
        <a href="web?subsection=clients"><div class="button web_subsection"><strong>Clients</strong><p>Client projects by JaL Productions</p></div></a>
    </div>

    <div class="col col-s">
        <a href="web?subsection=university"><div class="button web_subsection"><strong>University</strong><p>Projects for University modules</p></div></a>
        <a href="web?subsection=personal"><div class="button web_subsection"><strong>Personal</strong><p>Personal projects done in my spare time</p></div></a>
        <a href="web?subsection=jal"><div class="button web_subsection"><strong>JaL Productions</strong><p>Revisions of this site</p></div></a>
    </div>

    <?php  // All items
            foreach($feed->item as $item):
                if(!empty($subsection) && $item->subsection != $subsection) { continue; };
                getData($item);
            ?>
            <div class="web_project" id="<?= $short; ?>">
                <div class="col col-p">
                    <h3><?= $title; ?> <sup><?= $status; ?></sup><a href="web?site=<?= $short; ?>" class="web_link_icon">link</a></h3>
                    <?= $urlOutput; ?>
                    <h4>Client: <small><?= $client; ?></small></h4>
                    <h4>Brief:</h4>
                    <?= $brief; ?>
                    <h4>Technologies used:</h4>
                    <?= $techused; ?>
                </div>
                <div class="col col-s">
                    <img src="<?= $image; ?>" alt="<?= $title; ?>" class="web_image"/>
                </div>
            </div>
            <hr>
            <?php endforeach;
        }

        function getData($item) {
            global $title, $short, $status, $urlOutput, $client, $brief, $techused, $image;

            $title    = $item[0]->title;
            $short    = $item[0]->attributes()->short;
            $status   = $item[0]->status;
            $url      = $item[0]->url;
            $multiple = $item[0]->url->attributes()->multiple;
            $client   = $item[0]->client;
            $brief    = $item[0]->brief;
            $techused = $item[0]->techused;
            $image    = $item[0]->image;
            if(isset($multiple)) {
                $urlOutput = $url;
            } else {
                $urlOutput = "<a href=\"$url\" target=\"_blank\">$url</a>";
            }
        }
    ?>
</div>