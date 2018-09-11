<?php
/**
 * Wordpress script code sample prepared for AlgaeCal
 * prepared by Shelley Evans <shelley@infsoln.com>
 */

// Get goodies
wp_register_script('jquery3.2.1', 'https://code.jquery.com/jquery-3.3.1.min.js');
wp_add_inline_script('jquery3.2.1', 'var jQuery3_3_1 = $.noConflict(true);');
wp_enqueue_script('plugin-javascript', plugins_url('js.js', __FILE__), array('jquery3.3.1'));
wp_enqueue_style('styles', '/css/styles.css');

// Get data
$url = 'https://www.algaecal.com/wp-json/acf/v3/options/options';

$contents = file_get_contents($url);

if (!empty($contents)) {
    $contents = utf8_encode($contents);
    $jdata    = json_decode($contents);
}

$phone = '1-800-820-0184';
if (!empty($jdata->acf->default_phone_number)) {
    $phone = $jdata->acf->default_phone_number;
}

$modal_content = '';
if (!empty($jdata->acf->{'7yr_full_copy'})) {
    $modal_content = $jdata->acf->{'7yr_full_copy'};
}

$modal_title = '';
if (!empty($jdata->acf->{'7yr_title'})) {
    $modal_title = $jdata->acf->{'7yr_title'};
}

// Get today's open and close times
$dt = new DateTime();

$current_day  = $dt->format('N');
$current_time = $dt->format('hm');

$open  = '0800';
$close = '1400';

if (!empty($jdata->acf->office_hours)) {
    foreach ($jdata->acf->office_hours as $day_hours) {
        if ($day_hours->day == $current_day) {
            $open  = $day_hours->starting_time;
            $close = $day_hours->closing_time;
            break;
        }
    }
}

?>
<!-- noformat on -->
<div class="container-fluid">

<section>
  <header>
    <div class="row">
      <div class="col-12">
        <img src="images/logo.png" class="img-responsive" alt="AlgaeCal logo" />
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="tel:<?php echo $phone; ?>" class="text-large"><strong><span 
        class="text-dark">Tap to Talk</span> 
        <?php echo $phone; ?></strong></a>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-nowrap">
<?php if ($current_time >= $open && $current_time <= $close) { ?>

        <img src="images/phone_icon.gif" class="img-fluid" alt="Phone icon" />
        Speak to our Bone Health Specialists!<br />

<?php } ?>
      </div>
    </div>
  </header>
</section>

<div class="row">
  <div class="col-12">
    <p></p>
  </div>
</div>

<main>
  <section>
    <div class="row">
      <div class="col-md-6 text-center wide">
        <img src="images/introducing.gif" class="img-fluid" /></div>
      <div class="col-md-6">
      Build <strong>brand new bone</strong> WITHIN 6 MONTHS with this 
      <strong>rare algae</strong> calcium... even if you're 85!
      <script src="//fast.wistia.com/embed/medias/cecdwaq3dz.jsonp" async></script>
      <script src="//fast.wistia.com/assets/external/E-v1.js" async></script>
      <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;
      position:relative;"><div class="wistia_responsive_wrapper" 
      style="height:100%;left:0;position:absolute;top:0;width:100%;"><div 
      class="wistia_embed wistia_async_cecdwaq3dz videoFoam=true " 
      style="height:100%;width:100%">&nbsp;</div></div></div>
      <script>
        window._wq = window._wq || [];
    
        _wq.push({ id: "cecdwaq3dz", onReady: function(video) {
        video.bind('secondchange', function(s) {
        if (s >= 133) {
          var $ps = document.getElementById('products');
          $ps.style.visibility = "visible";
        }
        });
        }});
      </script>
      </div>
    </div>
  </section>

  <section>
    <div class="row" id="products" class="" style="visibility: hidden;">
      <div class="col-md-4 text-center"><a 
      href="https://www.algaecal.com/product/bone-builder-packs/"><img 
      src="images/3.gif" class="img-fluid" /></a></div>
      <div class="col-md-4 text-center"><a 
      href="https://www.algaecal.com/product/bone-builder-packs/"><img 
      src="images/6.gif" class="img-fluid" /></a></div>
      <div class="col-md-4 text-center"><a 
      href="https://www.algaecal.com/product/bone-builder-packs/"><img 
      src="images/12.gif" class="img-fluid" /></a></div>
    </div>
  </section>

<div class="row">
  <div class="col-12">
    <p></p>
  </div>
</div>

  <section>
    <div class="row">
      <div class="col-md-6">

        <header>
        <div class="row">
          <div class="col-12 text-center">
            <h1><span class="text-center">AlgaeCal Plus</span></h1>
          </div>
        </div>
        </header>

        <table style="width:100%" class="facts">
        <thead>
        <tr class="thick-bar">
          <td colspan="2">
            <h2>Supplement Facts</h2>
            <p><strong>4 Capsules Per Day<br />
            Servings Per Container: 22<br />
          </strong></p></td>
        </tr>
        </thead>

        <tbody>
        <tr class="thin-bar">
          <th colspan="2">Amount Per Serving <span class="float-right">%DV</span></th>
        </tr>
        <tr>
          <td><strong>Vitamin C 50mg<br /><small>(as calcium ascorbate)</small></strong></td>
          <td><strong>84%</strong></td>
        </tr>
        <tr>
          <td><strong>Vitamin D3 1600 IU<br /><small>(as cholecalciferol)</small></strong></td>
          <td><strong>400%</strong></td>
        </tr>
        <tr>
          <td><strong>Vitamin K2 100 mcg<br /><small>(as menaquinone-7)</small></strong></td>
          <td><strong>126%</strong></td>
        </tr>
        <tr>
          <td><strong>Calcium 720 mg<br /><small>(from algas calcareas)</small></strong></td>
          <td><strong>72%</strong></td>
        </tr>
        <tr class="thick-bar">
          <td><strong>Magnesium 350 mg<br /><small>(from algas calcareas and magnesium oxide)</small></strong></td>
          <td><strong>88%</strong></td>
        </tr>
        
        <tr class="thick-bar">
          <td><strong>Boron 3.0 mg*<br /><small>(as glycinate)</small></strong></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="2"><strong><small>*Daily Value (DV) not established</small></strong></td>
        </tr>
        </tbody>
        </table>

      </div>

      <div class="col-md-6">
        <header>
        <div class="row">
          <div class="col-12 text-center">
            <h1><span class="text-center">Strontium Boost</span></h1>
          </div>
        </div>
        </header>

        <table style="width:100%" class="facts">
        <thead>
        <tr class="thick-bar">
          <td colspan="2">
          <h2>Supplement Facts</h2>
          <p><strong>2 Capsules Per Day<br />
          Servings Per Container: 30<br />
          </strong></p></td>
        </tr>
        </thead>
        <tbody>
        <tr class="thin-bar">
          <th>Amount Per Serving</th>
          <th></th>
        </tr>
        <tr class="thick-bar">
          <td><strong>Strontium<br /><small>(from Strontium Citrate)</small></strong></td>
          <td><strong>680 mg*</strong></td>
        </tr>
        <tr>
          <td colspan="2"><strong><small>*Daily Value (DV) not established</small></strong></td>
        </tr>
        </tbody>
        </table>

      </div>
    </div>
  </section>

<div class="row">
  <div class="col-12">
    <p></p>
  </div>
</div>

  <section>
    <div class="container green-back">
      <header>
      <div class="row">
        <div class="col-12 text-center">
          <img src="images/strongerbones.gif" class="img-fluid" />
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <h1><span class="text-orange text-center">Stronger Bones for 7 Years Guarantee</span></h1>
        </div>
      </div>
      </header>

      <article>
      <div class="row">
        <div class="col-12">
        <p>When you follow directions for use of AlgaeCal Plus and Strontium Boost - 
        we guarantee you will see increased bone density in EVERY follow-up bone
        scan you have while using these 2 products - or we will refund every penny
        you paid for our products between your scans. This guarantee extends to every
        scan you have for the next 7 years! Also, if you are unsatisfied at any time
        you can return my product for all full refund, no questions asked!
        <a data-toggle="modal" href="#modal_info">Click Here for Details</a></p>
        </div>
      </div>
      </article>

      <div class="row">
        <div class="col-12 text-center">
          <img src="images/dean_neuls.gif" class="img-fluid" width="150" alt="Dean Neuls" />
        </div>
      </div>

      <div class="row">
        <div class="offset-md-5 col-md-2 text-nowrap">
          Dean Neuls,<br />
          CEO and Co-Founder,<br />
          AlgaeCal Inc.
        </div>
      </div>

    </div>
  </section>

<div class="row">
  <div class="col-12">
    <p></p>
  </div>
</div>

  <div id="modal_info" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $modal_title; ?></h4>
        </div>
        <div class="modal-body">
          <?php echo $modal_content; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>


  <section>
    <div class="row">
      <div class="col-12 text-center">
        <img src="images/books.gif" class="img-fluid" />
      </div>
    </div>
  </section>

<div class="row">
  <div class="col-12">
    <p></p>
  </div>
</div>

  <section>
    <header>
    <div class="row">
      <div class="col-12 text-center text-blue">
        <h1>Scientific References</h1>
      </div>
    </div>
    </header>

    <article>
    <div class="row">
      <div class="col-12">
        <ol>
          <li>Marques A, Ferreira RJ, Santos E, et al. The accuracy of osteoporotic 
          fracture risk prediction tools: a systematic review and meta-analysis.
          Ann Rheum Dis. 2015 Nov;74(11):1958-67.doi: 10.1136/annrheumdis-2015-207907. 
          Epub 2015 Aug 6. PMID: 26248637,</li>
          <li>Riggs BL, Melton LJ 3rd. The worldwide problem of osteoporosis: insights 
          afforded by epidemiology. Bone. 1995 Nov;17(5 Suppl):505S-511S. PMID: 8573428</li>
          <li>https://www.algaecal.com/expert-insights/prescription-drugs-that-cause-osteoporosis/</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-12 text-center">
        <a href="#">View Full Reference List...</a>
      </div>
    </div>
    </article>

  </section>

<div class="row">
  <div class="col-12">
    <p></p>
  </div>
</div>

  <section>
    <div class="row">
      <div class="col-12 text-center">
        <a href="#products"><img src="images/buynow.gif" alt="Click to buy now" /></a>
      </div>
    </div>
  </section>

</main>

<div class="row">
  <div class="col-12">
    <p></p>
  </div>
</div>

<footer>
  <div class="row">
    <div class="col-12 text-center">
      <img src="images/logo.png" class="img-fluid" />
    </div>
  </div>

  <div class="row">
    <div class="col-12 text-center"><small>
      <a href="#" class="text-dark">Shipping &amp; Returns</a> | 
      <a href="#" class="text-dark">Health Disclaimer</a> | 
      <a href="#" class="text-dark">Legal and Privacy Policy</a> | 
      <a href="#" class="text-dark">Contact</a> | 
      <a href="#" class="text-dark">Order Now</a>
      </small>
    </div>
  </div>

  <div class="row">
    <div class="col-12 text-center"><small>
      Copyright &copy; 2017 - <?php echo date('Y'); ?> AlgaeCal
      </small>
    </div>
  </div>

</footer>

</div>
<!-- noformat off -->

