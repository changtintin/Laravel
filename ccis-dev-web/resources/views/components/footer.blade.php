<div class="row">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-5" style="font-family: 'cwTeXYen'" id="footer">
    <div class="container-fluid">
      <span class="nav-text p-4 mt-4 footerField">
        <div class="row justify-content-around text-left" style="font-size: 16px;">
          <div class="col">
            <dl class="row">
              <p class="h6 col-lg-12 mb-5" style="font-size: 20px;  font-family: 'Poppins', sans-serif;">
                <!-- TODO: add to json -->
                <b>聯絡資訊</b>
              </p>
              @php
                use App\Models\FooterContact;
                include "../app/CustomSetting/conf.php";     
                $contacts = FooterContact::all();                           
              @endphp 
              @forelse ($contacts as $contact)
                <dt class="col-lg-2">
                  {{ $contact -> title }}
                </dt>
                <dd class="col-lg-10">
                  {{ $contact -> content }}
                </dd>
              @empty
                {{ $errorMsg['no_content'] }}
              @endforelse              
            </dl>
          </div>
          <div class="col">
            <p class="h6 col-lg-12 mb-5" style="font-size: 20px; font-family: 'Poppins', sans-serif;">
              <!-- TODO: add to json -->
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
                        <a href="/theme/{{ $theme -> title }}/" class="text-decoration-none">
                            {{ $navs[$theme -> title] }}
                        </a>
                    </dd>
                  @endif
                @endforeach
              @endisset                         
              <dd class="col-lg-6">
                <a href="/login" class="text-decoration-none" style="color:#fffff;"> 管理者登入 </a>
              </dd>

            </dl>
          </div>
        </div>
        <div class="row text-left pt-5 pb-2">
          <!-- TODO: Create Views function-->
          <!-- TODO: add to json-->
          <small>瀏覽人次：</small>
          <h5>
            國立政治大學 創新與創造力研究中心
            Center for Creativity and Innovation Studies, National Chengchi University
          </h5>
        </div>
      </span>
    </div>   
  </nav>
</div>