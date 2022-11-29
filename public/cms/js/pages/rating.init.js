function onload(e) {
    raterJs({
        starSize: 22,
        rating: 3,
        element: document.querySelector("#basic-rater"),
        rateCallback: function (e, t) {
            this.setRating(e), t()
        }
    }), raterJs({
        starSize: 22,
        step: .5,
        element: document.querySelector("#rater-step"),
        rateCallback: function (e, t) {
            this.setRating(e), t()
        }
    });
    var r = raterJs({
            isBusyText: "Rating in progress. Please wait...",
            starSize: 22,
            element: document.querySelector("#rater-message"),
            disableText: "Custom disable text!",
            ratingText: "My custom rating text {rating}",
            showToolTip: !0,
            rateCallback: function (e, t) {
                r.setRating(e), r.disable(), t()
            }
        }),
        t = (raterJs({
            max: 16,
            readOnly: !0,
            rating: 4.4,
            element: document.querySelector("#rater-unlimitedstar")
        }), raterJs({
            starSize: 22,
            element: document.querySelector("#rater-onhover"),
            rateCallback: function (e, t) {
                this.setRating(e), t()
            },
            onHover: function (e, t) {
                document.querySelector(".ratingnum").textContent = e
            },
            onLeave: function (e, t) {
                document.querySelector(".ratingnum").textContent = t
            }
        }), raterJs({
            starSize: 22,
            element: document.querySelector("#raterreset"),
            rateCallback: function (e, t) {
                this.setRating(e), t()
            }
        }));
    document.querySelector("#raterreset-button").addEventListener("click", function () {
        t.clear(), console.log(t.getRating())
    }, !1)
}
window.addEventListener("load", onload, !1);
