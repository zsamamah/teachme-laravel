@extends('layouts.template')

@section('content')

<section id="main-container" class="main-container">
    <div class="container">
  
      <div class="row">
        <div class="col-lg-8">
          <div id="page-slider" class="page-slider small-bg">
            @foreach ($images as $pic)
            <div class="item">
                <img loading="lazy" class="img-fluid" src="{{$pic->image}}" alt="saloon-image" />
              </div>
            @endforeach
          </div><!-- Page slider end -->
        </div><!-- Slider col end -->
  
        <div class="col-lg-4 mt-5 mt-lg-0">
  
          <h3 class="column-title mrt-0">{{$saloon->name}}</h3>
          <p>
            <a href="tel:{{$saloon->phone}}">{{$saloon->phone}}</a> <br>
            {{$saloon->location}}
          </p>
  
          <h4>Services : </h4>
          <ul class="project-info list-unstyled">
            @foreach ($services as $item)
            <li>
                <p class="project-info-label">{{$item->m_name}} - {{$item->price}} JD
                </p>
              </li>
            @endforeach
          </ul>
  
        </div><!-- Content col end -->
  
      </div><!-- Row end -->

      @auth
      <div class="row mt-3 mb-4 rate-form">
        <form class="fr" method="POST" action="{{ route('review.store',$saloon->id) }}">
          @csrf
          <label class="fr__label" for="face-rating">How was your experience?</label>
          <div class="fr__face" role="img" aria-label="Straight face">
            <div class="fr__face-right-eye" data-right></div>
            <div class="fr__face-left-eye" data-left></div>
            <div class="fr__face-mouth-lower" data-mouth-lower></div>
            <div class="fr__face-mouth-upper" data-mouth-upper></div>
          </div>
          <input class="fr__input" name="range" id="face-rating" type="range" value="3" min="1" max="5" step="1">
          <button class="btn-primary mt-3" type="submit">Add Review</button>
        </form>
      </div>
      @endauth

      <div class="row reviews-sec" id="rev-sec">
        <div class="container">
          <div class="chart">
            <div class="rate-box">
              <span class="value">5</span>
              <div class="progress-bar">
                <span class="progress"></span>
              </div>
              <span class="count">0</span>
            </div>
            <div class="rate-box">
              <span class="value">4</span>
              <div class="progress-bar"><span class="progress"></span></div>
              <span class="count">0</span>
            </div>
            <div class="rate-box">
              <span class="value">3</span>
              <div class="progress-bar"><span class="progress"></span></div>
              <span class="count">0</span>
            </div>
            <div class="rate-box">
              <span class="value">2</span>
              <div class="progress-bar"><span class="progress"></span></div>
              <span class="count">0</span>
            </div>
            <div class="rate-box">
              <span class="value">1</span>
              <div class="progress-bar"><span class="progress"></span></div>
              <span class="count">0</span>
            </div>
          </div>
          <div class="global">
            <span class="global-value">0.0</span>
            <div class="rating-icons">
              <span class="one"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
              <span class="two"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
            </div>
            <span class="total-reviews">0</span>
          </div>
        </div>
      </div>
  
    </div><!-- Conatiner end -->

  </section>


@endsection

@section('scripts')
<script>

      // reviews
      var review = {!! json_encode($reviews->toArray()) !!};
      var five = 0
      var four = 0
      var three = 0
      var twos = 0
      var one = 0
      async function calc_data(){
        await review.forEach(ele => {
        if(ele['range']=='5')
          five+=1
        else if(ele['range']=='4')
          four+=1
        else if(ele['range']=='3')
          three+=1
        else if(ele['range']=='2')
          twos+=1
        else if(ele['range']=='1')
          one+=1
      });
      }
      calc_data()

      if(review.length==0){
        document.getElementById('rev-sec').style.display='none';
      }

      let rateBox = Array.from(document.querySelectorAll(".rate-box"));
      let globalValue = document.querySelector(".global-value");
      let two = document.querySelector(".two");
      let totalReviews = document.querySelector(".total-reviews");
      let reviews = {
        5: five,
        4: four,
        3: three,
        2: twos,
        1: one,
      };
      updateValues();

      function updateValues() {
        rateBox.forEach((box) => {
          let valueBox = rateBox[rateBox.indexOf(box)].querySelector(".value");
          let countBox = rateBox[rateBox.indexOf(box)].querySelector(".count");
          let progress = rateBox[rateBox.indexOf(box)].querySelector(".progress");
          // console.log(typeof reviews[valueBox.innerHTML]);
          countBox.innerHTML = nFormat(reviews[valueBox.innerHTML]);

          let progressValue = Math.round(
            (reviews[valueBox.innerHTML] / getTotal(reviews)) * 100
          );
          progress.style.width = `${progressValue}%`;
        });
        totalReviews.innerHTML = getTotal(reviews)+' Reviews';
        finalRating();
      }
      function getTotal(reviews) {
        return Object.values(reviews).reduce((a, b) => a + b);
      }

      document.querySelectorAll(".value").forEach((element) => {
        element.addEventListener("click", () => {
          let target = element.innerHTML;
          reviews[target] += 1;
          updateValues();
        });
      });

      function finalRating() {
        let final = Object.entries(reviews)
          .map((val) => val[0] * val[1])
          .reduce((a, b) => a + b);
          // console.log(typeof parseFloat(final / getTotal(reviews)).toFixed(1));
        let ratingValue = nFormat(parseFloat(final / getTotal(reviews)).toFixed(1));
        globalValue.innerHTML = ratingValue;
        two.style.background = `linear-gradient(to right, #66bb6a ${
          (ratingValue / 5) * 100
        }%, transparent 0%)`;
      }

      function nFormat(number) {
        if (number >= 1000 && number < 1000000) {
          return `${number.toString().slice(0, -3)}k`;
        } else if (number >= 1000000 && number < 1000000000) {
          return `${number.toString().slice(0, -6)}m`;
        } else if (number >= 1000000000) {
          return `${number.toString().slice(0, -9)}md`;
        } else if (number === "NaN") {
          return `0.0`;
        } else {
          return number;
        }
      }



      // rating

      window.addEventListener("DOMContentLoaded",() => {
	const fr = new FaceRating("#face-rating");
});

class FaceRating {
	constructor(qs) {
		this.input = document.querySelector(qs);
		this.input?.addEventListener("input",this.update.bind(this));
		this.face = this.input?.previousElementSibling;
		this.update();
	}
	update(e) {
		let value = this.input.defaultValue;

		// when manually set
		if (e) value = e.target?.value;
		// when initiated
		else this.input.value = value;

		const min = this.input.min || 0;
		const max = this.input.max || 100;
		const percentRaw = (value - min) / (max - min) * 100;
		const percent = +percentRaw.toFixed(2);

		this.input?.style.setProperty("--percent",`${percent}%`);

		// face and range fill colors
		const maxHue = 120;
		const hueExtend = 30;
		const hue = Math.round(maxHue * percent / 100);

		let hue2 = hue - hueExtend;
		if (hue2 < 0) hue2 += 360;

		const hues = [hue,hue2];
		hues.forEach((h,i) => {
			this.face?.style.setProperty(`--face-hue${i + 1}`,h);
		});

		this.input?.style.setProperty("--input-hue",hue);

		// emotions
		const duration = 1;
		const delay = -(duration * 0.99) * percent / 100;
		const parts = ["right","left","mouth-lower","mouth-upper"];

		parts.forEach(p => {
			const el = this.face?.querySelector(`[data-${p}]`);
			el?.style.setProperty(`--delay-${p}`,`${delay}s`);
		});

		// aria label
		const faces = [
			"Sad face",
			"Slightly sad face",
			"Straight face",
			"Slightly happy face",
			"Happy face"
		];
		let faceIndex = Math.floor(faces.length * percent / 100);
		if (faceIndex === faces.length) --faceIndex;

		this.face?.setAttribute("aria-label",faces[faceIndex]);
	}
}


</script>
@endsection