<?php
require("database.php");

if (empty($_SESSION['user_id'])) {
    header('location: ' . $site_url);
    exit;
}
$total_score = $_SESSION['score'];

require("header.php");
$contact_info = "<br>In case of any emergency to contact this numbers:
    <ul>
        <li>16263 (Bangladesh Department of Health)</li>
        <li>333 (Government Information & Service)</li>
        <li>10655 (IEDCR).</li>
    </ul>";
?>


<div class="p-3 mb-2 bg-light text-dark">
    <h2>Advice</h2>

    <ul>
        <?php
        if ($total_score < 5) {
            echo "<li>Merely have chance to get affected by COVID-19<br><b>Advice:</b> Isolation and contact doctor and follow advice. 
            <br><span class='text-success'><b>* COVID-19 “Negative”.</b></span></li>";
        }
        if ($total_score >= 5) {
            echo "<li>Possible suspected case for COVID-19 affected. <br><b>Advice:</b> Isolation and contact doctor and follow advice.
            <br><span class='text-danger'><b>* COVID-19 “Positive”.</b></span></li>";
        }
        if ($total_score > 5 && $total_score < 7) {
            echo "<li>Highly chance of COVID-19 affected.<br><b>Advice:</b> Isolation and contact doctor immediately and follow advice.
                        <br><span class='text-danger'><b>* COVID-19 “Positive”.</b></span> 
                        " . $contact_info . "
                    </li>";
        }
        if ($total_score > 7) {
            echo "<li>Almost confirmed case of COVID-19 positive.<br><b>Advice:</b> Isolation and contact doctor immediately and follow advice. <br>
            <span class='text-danger'>Highly advice to be hospitalized.</span>
                        <br><span class='text-danger'><b>* COVID-19 “Positive”.</b></span>
                        " . $contact_info . "
                     </li>";
        }
        ?>
    </ul>
</div>
<br>
<div>

    <?php require_once("footer.php"); ?>