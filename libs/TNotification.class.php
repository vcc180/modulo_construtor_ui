<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TNotification
 *
 * @author vinic
 */
class TNotification {

    //put your code here

    public static function NotifyMe($icon, $title, $body) {
        ?>
        <script>

            function notifyMe() {
                var options = {
                    body: "<?php echo $body; ?>",
                    icon: "<?php echo $icon; ?>"
                }
                // Let's check if the browser supports notifications
                if (!("Notification" in window)) {
                    alert("This browser does not support desktop notification");
                }

                // Let's check whether notification permissions have already been granted
                else if (Notification.permission === "granted") {
                    // If it's okay let's create a notification
                    var notification = new Notification("<?php echo $title; ?>", options);
                }

                // Otherwise, we need to ask the user for permission
                else if (Notification.permission !== "denied") {
                    Notification.requestPermission(function (permission) {
                        // If the user accepts, let's create a notification
                        if (permission === "granted") {
                            var notification = new Notification("df!");
                        }
                    });
                }

                // At last, if the user has denied notifications, and you 
                // want to be respectful there is no need to bother them any more.
            }
            notifyMe();
        </script>
        <?php
    }

    public static function NotifyMeLink($icon, $title, $body,$link) {
        ?>
        <script>

            function NotifyMeLink() {
                var notification = new window.Notification("<?php echo $title; ?>!",
                        {
                            body: "<?php echo $body; ?>",
                            icon: "<?php echo $icon; ?>",
                            data: "<?php echo $link; ?>"
                        });

                notification.onclick = function (e) {
                    window.location.href = e.target.data;
                }
                // At last, if the user has denied notifications, and you 
                // want to be respectful there is no need to bother them any more.
            }
            NotifyMeLink();
        </script>
        <?php
    }

}
?>