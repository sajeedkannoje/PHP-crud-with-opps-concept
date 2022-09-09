<?php
  namespace Traits;
  ob_start();
  trait Redirect{
        public static function redirect($url, $statusCode = 303)
        {
            if (headers_sent() === false)
            {
                header('Location: ' . $url, true, $statusCode);
                die;
            }
        }
  }
  ob_end_flush();
  ?>
