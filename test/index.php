<meta charset="utf8"/>
<?php

$str = "
                　　英文原文：10ThingsGooglePlayDoesBetterthantheAppStore　　在本文中，HourTracker的制作者分享了他对于GooglePlay和AppStore两者的看法。它们在面对程序员时所采取的立场和态度。固然AppStore为他带来的收入是Android环境下的好几倍，但是他相信如果Apple能够从Google身上学到下面的十点内容，那么它将经营的更加出色。...";

echo preg_replace("/\s+|u3000/ism","",$str);