<div class="row p-3" style="margin-top: 1vh;">
    <section id="scroll-title">
        <div class="container reveal fade-bottom">
        <h2>涓滴匯流</h2>
        <p class="text-center text-secondary h5 pt-3">
            我們會持續探索新領域，開啟未來視野，延續各階段之經驗，
            <br>
            努力朝向建設政大為亞太研發創新之頂尖知識基地的目標努力。
        </p>
        </div>
    </section>

    <section class="container">
        <!-- Table -->
        <div class='p-1 m-1'>
            <thead>
                <div class='row m-2 p-2 border-1 rounded-2 fw-bolder event-tb-header'>
                    <div class='col-lg-8  col-md-8 col-sm-7 col-xs-5'> 標題 </div>
                    <div class='col-lg-2  col-md-2 col-sm-3 col-xs-5'> 張貼日期 </div>
                </div>
            </thead>
            @php
                use App\Models\Display;
                $displays = Display::all();            
            @endphp
            @isset($displays)
                @foreach ($displays as $display)
                    <div class='row m-2 p-2 border-1 rounded-2 event-tb-row justify-content-center overflow-auto'>
                        <div class='col-lg-8  col-md-8 col-sm-7 col-xs-5'> 
                            <a href='index.php?display_id=47' class='text-decoration-none text-black text-wrap overflow-auto'> 
                                {{$display -> title}} 
                            </a> 
                        </div>
                        <div class='col-lg-4  col-md-4 col-sm-5 col-xs-5'>
                            <div style='font-size: medium;'> {{$display -> date}} </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
        <!-- ./ Table -->
    </section>
</div>
<div class="text-end p-4 me-4">
    <button id="display" class="circle-btn p-3">
        ...點我看更多內容
    </button>
</div>