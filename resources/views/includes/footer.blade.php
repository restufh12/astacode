<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-newsletter">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h4>Join Our Newsletter</h4>
          <p>{{ $header_setting->join_our_newsletter }}</p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>{{ $company_setting->company_name }}</h3>
          <p>
            {!! nl2br($company_setting->company_address) !!}
            <br>
            <strong>Phone:</strong> {{ $company_setting->company_tel }}
            <br>
            <strong>Email:</strong> {{ $company_setting->company_email }}
          </p>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i><a href="{{ url('/') }}">Home</a></li>
            <li><i class="bx bx-chevron-right"></i><a href="{{ url('/') }}#portfolio">Portfolio</a></li>
            <li><i class="bx bx-chevron-right"></i><a href="{{ url('/') }}#pricing">Pricing</a></li>
            <li><i class="bx bx-chevron-right"></i><a href="{{ url('/') }}#faq">FAQ</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            @foreach($services as $service)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}#services">{{ $service->service_name }}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Social Networks</h4>
          <p>{{ $header_setting->our_social_network }}</p>
          <div class="social-links mt-3">
            <a href="{{ $company_setting->link_twitter }}" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="{{ $company_setting->link_facebook }}" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="{{ $company_setting->link_instagram }}" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="{{ $company_setting->link_skype }}" target="_blank" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="{{ $company_setting->link_linkedin }}" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container footer-bottom clearfix">
    <div class="copyright">
      &copy; Copyright <strong><span>{{$company_setting->company_name}}</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer><!-- End Footer -->