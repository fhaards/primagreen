<style type="text/css">
    .homepage-banner {
        max-width: 1600px;
        /* height: 35rem; */
        /* background: url(../../image/bg4.jpg) no-repeat center center fixed; */
        background: url(<?= base_url() . 'uploads/banner/' . getBannerData()['main_banner']; ?>) no-repeat center center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-color:#A7F3D0;
    }

    .signup-banner {
        height: 500px;
        width: 100%;
        background: url(<?= base_url() . 'uploads/banner/' . getBannerData()['regist_banner']; ?>);
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .login-banner {
        height: 500px;
        width: 100%;
        background: url(<?= base_url() . 'uploads/banner/' . getBannerData()['login_banner']; ?>) no-repeat center center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .contactus-banner {
        width: 100%;
        height: 500px;
        background: url(<?= base_url() . 'uploads/banner/' . getBannerData()['contactus_banner']; ?>);
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>