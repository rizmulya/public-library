<?php
// NOTIF MESSAGE
class Flasher{
    public static function setFlash($hasil, $pesan, $warna1, $warna2 = null){
        $_SESSION['flash'] = [
            'hasil'=> $hasil,
            'pesan' => $pesan,
            'warna1' => $warna1,
            'warna2' => $warna2,
        ];
    }

    public static function flash(){
        if(isset($_SESSION['flash'])){
            echo '<div id="alert-border-3" class="flex items-center p-4 mb-5 text-' . $_SESSION['flash']['warna1'] . '-800 border-t-4 border-' . $_SESSION['flash']['warna1'] . '-300 bg-' . $_SESSION['flash']['warna1'] . '-50 dark:text-' . $_SESSION['flash']['warna1'] . '-400 dark:bg-gray-800 dark:border-' . $_SESSION['flash']['warna1'] . '-800" role="alert">
            <div class="ml-3 text-sm font-medium">
              <strong>' . $_SESSION['flash']['hasil'] . '</strong> ' . $_SESSION['flash']['pesan'] . '
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-' . $_SESSION['flash']['warna1'] . '-50 text-' . $_SESSION['flash']['warna1'] . '-500 rounded-lg focus:ring-2 focus:ring-' . $_SESSION['flash']['warna1'] . '-400 p-1.5 hover:bg-' . $_SESSION['flash']['warna1'] . '-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-' . $_SESSION['flash']['warna1'] . '-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
              <span class="sr-only">Dismiss</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
            </button>
        </div>';
          unset($_SESSION['flash']);
        }
    }

    public static function flash_flowbite(){
        if(isset($_SESSION['flash'])){
          echo '<div class="flex ml-3 justify-center items-center px-3 text-xs font-bold text-white bg-gradient-to-br from-' . $_SESSION['flash']['warna1'] . ' to-' . $_SESSION['flash']['warna2'] . ' rounded-2xl">
          <div class="text-center"> '.
            $_SESSION['flash']['pesan'] .
          '<div>
          </div>';
          unset($_SESSION['flash']);
        }
    }


}
?>