Hi,<?= $fullName ?><br/><br/>

Anda berhasil mendaftar di Expo 7.<br/>
Silahkan menverifikasi email anda dengan klik <a href="<?= Router::url("/member/activation?token={$token}", true) ?>">disini</a>.<br/>