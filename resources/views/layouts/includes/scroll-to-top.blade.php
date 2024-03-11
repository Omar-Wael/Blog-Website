<!--begin::Scrolltop-->
<button id="myBtn">
    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M2.55713 13.0286C2.55713 10.2514 3.66037 7.5879 5.62414 5.62413C7.58791 3.66036 10.2514 2.55713 13.0286 2.55713H34.9714C37.7486 2.55713 40.4121 3.66036 42.3758 5.62413C44.3396 7.5879 45.4428 10.2514 45.4428 13.0286V34.9714C45.4428 37.7486 44.3396 40.4121 42.3758 42.3758C40.4121 44.3396 37.7486 45.4428 34.9714 45.4428H13.0286C10.2514 45.4428 7.58791 44.3396 5.62414 42.3758C3.66037 40.4121 2.55713 37.7486 2.55713 34.9714V13.0286Z"
            fill="#15468E" stroke="black" />
        <path
            d="M24 10.2857L25.4537 8.832C25.2627 8.64084 25.0358 8.48919 24.7862 8.38573C24.5365 8.28227 24.2689 8.22899 23.9986 8.22899C23.7284 8.22899 23.4608 8.28227 23.2111 8.38573C22.9614 8.48919 22.7346 8.64084 22.5435 8.832L24 10.2857ZM21.9429 37.7143C21.9429 38.2599 22.1596 38.7831 22.5454 39.1689C22.9312 39.5547 23.4544 39.7714 24 39.7714C24.5456 39.7714 25.0688 39.5547 25.4546 39.1689C25.8404 38.7831 26.0571 38.2599 26.0571 37.7143H21.9429ZM33.5177 22.7109C33.9055 23.0858 34.4251 23.2934 34.9644 23.2889C35.5038 23.2845 36.0199 23.0684 36.4015 22.6872C36.7831 22.3059 36.9997 21.7901 37.0046 21.2507C37.0095 20.7113 36.8024 20.1916 36.4279 19.8034L33.5177 22.7109ZM11.5749 19.8034C11.2003 20.1916 10.9932 20.7113 10.9981 21.2507C11.0031 21.7901 11.2197 22.3059 11.6013 22.6872C11.9829 23.0684 12.4989 23.2845 13.0383 23.2889C13.5777 23.2934 14.0972 23.0858 14.485 22.7109L11.5749 19.8034ZM21.9429 10.2857V37.7143H26.0571V10.2857H21.9429ZM36.4251 19.8034L25.4537 8.832L22.5435 11.7394L33.515 22.7109L36.4251 19.8034ZM22.5435 8.832L11.5721 19.8034L14.4823 22.7109L25.4537 11.7394L22.5435 8.832ZM13.0286 4.11429H34.9714V0H13.0286V4.11429ZM43.8857 13.0286V34.9714H48V13.0286H43.8857ZM34.9714 43.8857H13.0286V48H34.9714V43.8857ZM4.11429 34.9714V13.0286H0V34.9714H4.11429ZM13.0286 43.8857C10.6644 43.8857 8.39697 42.9465 6.72522 41.2748C5.05347 39.603 4.11429 37.3356 4.11429 34.9714H0C0 38.4268 1.37265 41.7407 3.81598 44.184C6.25931 46.6274 9.57318 48 13.0286 48V43.8857ZM43.8857 34.9714C43.8857 37.3356 42.9465 39.603 41.2748 41.2748C39.603 42.9465 37.3356 43.8857 34.9714 43.8857V48C38.4268 48 41.7407 46.6274 44.184 44.184C46.6274 41.7407 48 38.4268 48 34.9714H43.8857ZM34.9714 4.11429C37.3356 4.11429 39.603 5.05347 41.2748 6.72522C42.9465 8.39698 43.8857 10.6644 43.8857 13.0286H48C48 9.57318 46.6274 6.25929 44.184 3.81596C41.7407 1.37263 38.4268 0 34.9714 0V4.11429ZM13.0286 0C9.57318 0 6.25931 1.37263 3.81598 3.81596C1.37265 6.25929 0 9.57318 0 13.0286H4.11429C4.11429 10.6644 5.05347 8.39698 6.72522 6.72522C8.39697 5.05347 10.6644 4.11429 13.0286 4.11429V0Z"
            fill="white" />
    </svg>
</button>
<!--end::Scrolltop-->
@push('scripts')
    <script>
        // top btn
        let mybutton = document.getElementById("myBtn");
        mybutton.addEventListener('click', topFunction)
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        // end top btn
    </script>
@endpush
