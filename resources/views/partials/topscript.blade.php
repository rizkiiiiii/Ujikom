{{-- <link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
<style>
  .mobil {
    transition: .3s;
  }

  .mobil:hover {
    transform: translateY(-5px);
  }
</style>
<style>
.footer {
  margin-top: 80px !important;
  font-family: 'Dosis', sans-serif !important;
  border-radius: 5px !important;
  box-shadow: 1px 1px 5px rgba(0,0,0,.3) !important;
  font-size: 1.1em !important;
}

.footer .line {
  display: block !important;
  width: 50px !important;
  height: 2px !important;
  background-color: rgb(72, 68, 75) !important;
  border-radius: 3px !important;
  margin: 0 !important;
  margin-top: -8px !important;
}

.footer .links {
  display: flex !important;
  justify-content: space-around !important;
  padding: 20px 10% 20px 20px !important;
  flex-wrap: wrap !important;
}

.footer .links div h4 {
  font-size: 1.2em !important;
}

.footer .links div:first-child h4 {
  font-size: 1.3em !important;
}

.footer .links div ul li {
  margin-bottom: 15px !important;
  font-size: 1em !important;
  color: #4d4d4d !important;
  font-weight: 600 !important;
  transition: .3s !important;
  user-select: none !important;
  cursor: pointer !important;
}

.footer .links div ul li a {
  color: #4d4d4d !important;
}

.footer .links div ul li:hover {
  color: #a5a2a2 !important;
}

.footer .links div ul {
  margin-top: 15px !important;
  margin-left: -28px !important;
}

.footer .links div:nth-child(3) ul li {
  display: flex !important;
  align-items: center !important;
}

.footer .links div:nth-child(3) ul li svg {
  margin-top: 2px !important;
  color: #424242a1 !important;
}

.footer .links div:nth-child(3) ul li span {
  margin-left: 10px !important;
}

.footer .links div:last-child ul {
  display: flex !important;
  align-items: center !important;
}

.footer .links div:last-child ul li {
  margin-right: 10px !important;
  padding: 8px !important;
  border-radius: 50% !important;
  background-color: #70707031 !important;
  display: flex !important;
  justify-content: center !important;
  align-items: center !important;
  cursor: pointer !important;
}

.footer .links div:first-child {
  width: 100% !important;
  max-width: 350px !important;
}

.footer .links div:first-child p {
  position: absolute !important;
  bottom: 0 !important;
  left: 0 !important;
}

.footer .links ~ div:last-child {
  padding: 15px 10px !important;
  border-top: 0.5px #4d4d4d27 solid !important;
}

.footer .links ~ div:last-child h4 {
  font-weight: 400 !important;
  font-size: .9em !important;
  font-family: 'Quicksand', sans-serif !important;
  font-weight: 600 !important;
}

.footer .links ~ div:last-child h4 a {
  color: #727272 !important;
}

@media (max-width: 1100px) {
  .footer .links {
    display: flex !important;
    justify-content: space-between !important;
    padding: 20px 5% 20px 20px !important;
    flex-wrap: wrap !important;
  }
}

@media (max-width: 850px) {
  .footer .links div:first-child {
    margin-bottom: 30px !important;
  }
  .footer .links div:nth-child(2) {
    margin-bottom: 30px !important;
  }
  .footer .links div:nth-child(3) {
    margin-bottom: 30px !important;
  }
}
</style>