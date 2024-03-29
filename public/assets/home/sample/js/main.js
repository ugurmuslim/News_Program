var mainSlider;
class MainSlider {

    currentImage = 0;
    right = document.getElementById("mainSliderRight");
    left = document.getElementById("mainSliderLeft");
    center = document.getElementById("mainSliderCover");
    timer = null;

    restartTimer() {
        clearInterval(this.timer)
        this.timer = setInterval(() => {
            this.controlSlider("next")
        }, 5000)
    }

    sliderImages = [];

    async insertSliders() {
        var slider;
        return await $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            async: false,
            url: "https://parafesor.net/home/sliders",
            contentType: false,
            processData: false,
            success: function(response) {
                var slider = []
                for (var i = 0; i < response.length; i++) {
                    slider.push({
                        caption: response[i].title,
                        image: "https://parafesor.net/images/6185315d5bfce.png",
                    });
                }
                return slider;

            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        })
    }


    async addImages() {
        this.sliderImages = await $.when(this.insertSliders()).done(function(response) {
            return response
        })
        let imagesContainer = document.getElementById("images");
        let toAdd = "";
        for (let img of this.sliderImages) {
            toAdd += `<div class="mainSliderSlide d-none" style="background-image: url(${img.image})"></div>`
        }
        imagesContainer.innerHTML = toAdd;
        this.left.innerHTML = toAdd;
        this.left.children[this.sliderImages.length - 1].classList.remove("d-none")

        this.right.innerHTML = toAdd
        this.right.children[1].classList.remove("d-none")

        this.center.innerHTML = toAdd;
        this.center.children[0].classList.remove("d-none")
        this.center.innerHTML += `<div class="redFilterOverlay"><div id="mainSliderCaption"><p>
    <a href="https://parafesor.net/${this.sliderImages[this.currentImage].slug}">${this.sliderImages[0].caption}</a></p>
    <div class="slider-text-bottom">
        <span
            class="text-white ">${this.sliderImages[this.currentImage].createdAt}</span><span> • ${this.sliderImages[this.currentImage].createdAtTime} • parafesor</span>
    </div>
    </div></div>`
        this.restartTimer();
    }

    controlSlider(direction) {

        let leftIndex = 0;
        let rightIndex = 0;
        let centerIndex = this.currentImage;

        this.right.childNodes.forEach(i => {
            if (i.classList.contains("d-none") == false) {
                i.classList.add("d-none");
            }
        })
        this.left.childNodes.forEach(i => {
            if (i.classList.contains("d-none") == false) {
                i.classList.add("d-none");
            }
        })
        this.center.childNodes.forEach(i => {
            if (i.classList.contains("d-none") == false && i.classList.contains("redFilterOverlay") ==
                false) {
                if (i.classList.contains("d-none") == false) {
                    i.classList.add("d-none");

                }
            }
        });

        if (direction == "next") {
            centerIndex = this.currentImage + 1 >= this.sliderImages.length - 1 ? 0 : this.currentImage + 1;
        }
        if (direction == "previous") {
            centerIndex = this.currentImage - 1 < 0 ? this.sliderImages.length - 1 : this.currentImage - 1;
        }

        leftIndex = centerIndex == 0 ? this.sliderImages.length - 1 : centerIndex - 1;
        rightIndex = centerIndex == this.sliderImages.length - 1 ? 0 : centerIndex + 1;
        console.log(leftIndex + " - " + centerIndex + " - " + rightIndex)

        this.right.children[rightIndex].classList.remove("d-none");
        this.left.children[leftIndex].classList.remove("d-none");
        this.center.children[centerIndex].classList.remove("d-none");

        this.currentImage = centerIndex;

        document.getElementById("mainSliderCaption").classList.add("fade-in-caption");
        document.getElementById("mainSliderCaption").innerText = this.sliderImages[this.currentImage].caption;
        document.getElementById("mainSliderCaption").innerHTML = `<p>
    <a href="https://parafesor.net/${this.sliderImages[this.currentImage].slug}" style="text-decoration: none">${this.sliderImages[this.currentImage].caption}</a>
    <div class="slider-text-bottom">
        <span
            class="text-white ">${this.sliderImages[this.currentImage].createdAt}</span><span> • ${this.sliderImages[this.currentImage].createdAtTime} • parafesor</span>
        </div>
    </p>`;

        setTimeout(() => {
            document.getElementById("mainSliderCaption").classList.remove("fade-in-caption");
        }, 1000)

    }
}

window.addEventListener('resize', runResizeEvents);

function runResizeEvents() {
    multilineEllipsis();

    keepRatio();
    matchHeight();
    console.log("resize triggered")
}

function matchHeight() {
    let matchList = document.getElementsByClassName("match");
    for (let m of matchList) {
        console.log(m.attributes.matchTo.value);
        let height = document.getElementById(m.attributes.matchTo.value).offsetHeight;
        m.style.height = height + "px";
    }
}


function keepRatio() {
    let toKeepList = document.getElementsByClassName("keep-ratio");
    for (let k of toKeepList) {
        let ratio = k.attributes.ratio.value * 1;
        let height = k.offsetWidth * ratio + "px";
        k.style.height = height
    }
}

function multilineEllipsis() {
    let toEllipsisList = document.getElementsByClassName("multilineEllipsis");
    for (let k of toEllipsisList) {
        if (k.attributes.text == undefined)
            k.attributes.text = k.innerHTML;
        else
            k.innerHTML = k.attributes.text;
        let wordArray = k.attributes.text.split(' ');

        let multilineEllipsisMax = k.attributes.multilineEllipsisMax.value * 1;

        while (k.scrollHeight > multilineEllipsisMax) {
            wordArray.pop();
            k.innerHTML = wordArray.join(' ') + '...';
        }
        k.scrollHeight = multilineEllipsisMax;
    }
}


var cardSlider;

class CardSlider {
    configureSliders() {
        cardSlider = this;
        var a = document.getElementsByClassName("cardSlider");
        Array.prototype.forEach.call(a, function(s) {
            s.attributes.currentSlide.value = -1;
            cardSlider.controlSlider(s, "next");
            var d = s.children[2].children;
            Array.prototype.forEach.call(d, function(c) {
                if (c.attributes.direction.value == "next") {
                    c.addEventListener("click", function() {
                        cardSlider.controlSlider(s, "next")

                    })
                } else if (c.attributes.direction.value == "previous") {
                    c.addEventListener("click", function() {
                        cardSlider.controlSlider(s, "previous")
                    })
                }
            })
        });
    }

    controlSlider(slider, direction) {
        for (let i = 0; i < slider.childNodes.length - 1; i++) {
            if (slider.children[i] && slider.children[i].className == "news-card-slider-container") {
                let current = slider.attributes.currentSlide.value * 1;
                let count = slider.children[i].children.length;
                if (direction == "next") {
                    current = current + 1 > count - 1 ? 0 : current + 1;
                } else {
                    current = current - 1 < 0 ? count - 1 : current - 1;
                }
                slider.attributes.currentSlide.value = current;

                if(slider.attributes.id.value == "firstCardSlide" || slider.attributes.id.value == "secondCardSlide"){
                    slider.lastElementChild.firstElementChild.textContent = current + 1;
                }
                let b = slider.children[i].children;
                Array.prototype.forEach.call(b, function(s) {
                    s.classList.add("d-none")
                })
                slider.children[i].children[current].classList.remove("d-none");
            }
        }
    }
}

mainSlider = new MainSlider();
mainSlider.insertSliders()
mainSlider.addImages()
let cs = new CardSlider()
runResizeEvents()
cs.configureSliders()


