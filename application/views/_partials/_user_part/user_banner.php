<style type="text/css">
    .homepage-banner {
        max-width: 1600px;
        height: 35rem;
        /* background: url(../../image/bg4.jpg) no-repeat center center fixed; */
        background: url(<?= base_url() . 'uploads/banner/' . getBannerData()['main_banner']; ?>) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .signup-banner {
        height: 700px;
        width: 100%;
        background: url(<?= base_url() . 'uploads/banner/' . getBannerData()['regist_banner']; ?>);
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .login-banner {
        height: 700px;
        width: 100%;
        background: url(<?= base_url() . 'uploads/banner/' . getBannerData()['login_banner']; ?>);
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>