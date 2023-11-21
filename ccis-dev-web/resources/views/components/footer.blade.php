<div class="row">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-5" style="font-family: 'cwTeXYen'" id="footer">
    <div class="container-fluid">
      <span class="nav-text p-4 mt-4 footerField">
        <div class="row justify-content-around text-left" style="font-size: 16px;">
          <div class="col">
            <dl class="row">
              <p class="h6 col-lg-12 mb-5" style="font-size: 20px;  font-family: 'Poppins', sans-serif;">
                <b>聯絡資訊</b>
              </p>
              <dt class="col-lg-2">電話</dt>
              <dd class="col-lg-10">886-2-29393091 ext. 65771</dd>
              <dt class="col-lg-2">傳真</dt>
              <dd class="col-lg-10">886-2-86618498</dd>
              <dt class="col-lg-2">信箱</dt>
              <dd class="col-lg-10">ccis@nccu.edu.tw http://www.ccis.nccu.edu.tw</dd>
              <dt class="col-lg-2">地址</dt>
              <dd class="col-lg-10">
                116臺北市文山區指南路二段64號 逸仙樓7樓
                <br>
                64, Sec. 2, ZhiNan Rd., Wenshan District, Taipei City 11605, Taiwan (R.O.C)
              </dd>
            </dl>
          </div>
          <div class="col">
            <p class="h6 col-lg-12 mb-5" style="font-size: 20px; font-family: 'Poppins', sans-serif;">
              <b>網站地圖</b>
            </p>
            <dl class="row"> 
              @php
                use App\Models\Theme;
                $themes = Theme::all();                           
              @endphp             
              @isset($themes)
                @foreach($themes as $theme)  
                  @if ($theme -> level == 1)  
                    <dd class="col-lg-6">
                        <a href="theme/{{ $theme -> title }}/" class="text-decoration-none">
                            {{ $theme -> title }}
                        </a>
                    </dd>
                  @endif
                @endforeach
              @endisset                         
              <dd class="col-lg-6">
                <a href="/login" class="text-decoration-none"> 管理者登入 </a>
              </dd>
            </dl>
          </div>
        </div>
        <div class="row text-left pt-5 pb-2">
          <small><?php echo "瀏覽人次："?></small>
          <h5>
            國立政治大學 創新與創造力研究中心
            Center for Creativity and Innovation Studies, National Chengchi University
          </h5>
        </div>
      </span>
    </div>   
  </nav>
</div>