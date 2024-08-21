<script setup>
import { Link, router  } from "@inertiajs/vue3";
import  Nav  from "./Nav.vue";
import { reactive, watch } from "vue";


defineProps({ errors: Object })
let form = reactive({
  query: ''
});

let submit = () => {
  router.post('/search', 
   {query: form.query}, 
  );

}
</script>
<template>
     <header
      class="flex w-full flex-col relative items-center flex-shrink-0 bg-[#0C0E0F]"
    >
      <div class="h-[60px] py-4 flex-shrink-0 bg-[#0C0E0F] w-full">
        <div
          class="container px-3 flex items-center justify-between mx-auto my-auto"
        >
          <div class="hidden lg:block">
            <Link href="/">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="88"
              height="30"
              viewBox="0 0 88 30"
              fill="none"
            >
              <path
                d="M68.1301 22.9798H64.6853V9.97244H62.834V6.99922H64.6853V5.9773C64.6853 1.37671 65.8669 0 69.1809 0C70.2663 0 72.6257 0.320075 72.6257 0.320075L72.5949 3.16604C72.5949 3.16604 71.0322 3.10048 70.043 3.10048C68.5766 3.10048 68.1301 3.80233 68.1301 6.00815V6.99922H72.3408V9.97244H68.1301V22.9798Z"
                fill="white"
              />
              <path
                d="M76.9334 6.99897L80.3128 20.0063H81.1749L84.5543 6.99897H87.9991L81.937 29.8477H78.523L80.4359 22.9757H77.6917L73.5117 6.99512H76.9334V6.99897Z"
                fill="white"
              />
              <path
                d="M31.9587 19.2082C32.0241 20.1684 32.4359 20.5502 33.3635 20.6775L33.2673 23.3306C31.3197 23.3306 30.2035 23.0761 29.0258 22.1467C29.0258 22.1467 26.4739 23.3306 23.8913 23.3306C20.7352 23.3306 19.1379 21.5721 19.1379 18.248C19.1379 14.8621 20.9892 13.7091 24.3994 13.4237L28.5139 13.0728V11.9236C28.5139 10.1651 27.7479 9.62139 26.1853 9.62139C24.0491 9.62139 20.1886 9.94146 20.1886 9.94146L20.0616 7.48113C20.0616 7.48113 23.5372 6.64817 26.4739 6.64817C30.3652 6.64817 31.9587 8.27939 31.9587 11.9198V19.2082ZM24.815 15.8841C23.3486 16.0113 22.6135 16.717 22.6135 18.1516C22.6135 19.59 23.2177 20.4846 24.561 20.4846C26.3777 20.4846 28.5177 19.7828 28.5177 19.7828V15.5331L24.815 15.8841ZM40.5071 9.97231V17.0024C40.5071 19.401 40.6034 20.2301 42.2622 20.2301C43.1552 20.2301 44.8757 20.1337 44.8757 20.1337L45.0335 22.9141C45.0335 22.9141 42.8973 23.3306 41.7811 23.3306C38.1747 23.3306 37.0585 21.9886 37.0585 17.388V9.97231H35.0186V6.99909H37.0585V2.36379H40.5033V6.99909H44.9065V9.97231H40.5071ZM59.9981 20.0065L60.0635 22.5941C60.0635 22.5941 56.4263 23.3306 53.6204 23.3306C48.8362 23.3306 46.9849 20.7739 46.9849 15.1475C46.9849 9.29746 49.5059 6.64817 53.9053 6.64817C58.37 6.64817 60.6024 8.98124 60.6024 13.9675L60.3792 16.4586H50.4913C50.522 19.0154 51.4804 20.2918 54.1285 20.2918C56.6495 20.2918 59.9981 20.0065 59.9981 20.0065ZM57.1884 13.7746C57.1884 10.5778 56.23 9.52498 53.9014 9.52498C51.542 9.52498 50.4874 10.7089 50.4566 13.7746H57.1884ZM13.1105 14.3801C15.4391 13.2965 16.6823 11.1523 16.6823 8.05187C16.6823 3.1929 14.0996 1.0835 9.28077 1.0835H0.986328V10.0996C1.01327 10.0494 1.03636 10.007 1.07485 9.94532C1.10949 9.92218 1.12874 9.91061 1.13644 9.89519C2.42198 8.00945 4.11936 6.6983 6.34404 6.11599C6.6481 6.03501 6.74048 5.82677 6.73278 5.54526C6.72508 5.09407 6.73278 4.64288 6.70584 4.19169C6.67889 3.71351 6.8367 3.60939 7.29087 3.79063C9.40009 4.63131 11.5208 5.44885 13.6339 6.28182C14.2767 6.53633 14.2728 6.5479 13.7417 7.00295C11.567 8.85784 9.38854 10.7166 7.21005 12.5715C7.12922 12.6409 7.05609 12.7643 6.87519 12.6717C6.86364 12.2244 6.84825 11.7539 6.8367 11.2873C6.81746 10.4929 6.75202 10.4312 5.98224 10.6819C4.97382 11.0135 4.00389 11.4339 3.19177 12.1434C2.61058 12.6525 2.06788 13.2001 1.78691 13.9289C1.65989 14.2605 1.53288 14.5883 1.41741 14.92C1.071 16.0306 0.997875 16.8443 0.986328 17.2453V22.9758H4.52734V15.1822H9.66181L12.8179 22.9797H16.7092L13.1105 14.3801Z"
                fill="url(#paint0_linear_5063_2069)"
              />
              <defs>
                <linearGradient
                  id="paint0_linear_5063_2069"
                  x1="1.96573"
                  y1="-0.609813"
                  x2="55.6168"
                  y2="30.3063"
                  gradientUnits="userSpaceOnUse"
                >
                  <stop offset="0.00558659" stop-color="#0CCDA3" />
                  <stop offset="0.238" stop-color="#0ECF9F" />
                  <stop offset="0.448" stop-color="#14D694" />
                  <stop offset="0.6494" stop-color="#1EE082" />
                  <stop offset="0.8442" stop-color="#2CEF68" />
                  <stop offset="1" stop-color="#3AFF4E" />
                </linearGradient>
              </defs>
            </svg>
          </Link>
          </div>
          <div class="flex relative">
            <form @submit.prevent="submit">
              <input
                type="text"
                placeholder="Search"
                class="px-10 py-2 border bg-[#181C1F] h-[24.48px] flex-shrink-0 rounded-[40px] text-white w-[196px] lg:w-[519px] lg:h-[36px] border-[#737373] md:pl-8"
                style="padding-left: 2.5rem"
                v-model="form.query"
                required
              />
              <div v-if="$page.props.errors.query">{{ $page.props.errors.query   }}</div>
              <div v-if="errors">{{ errors }}</div>
            </form>
            

            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="absolute left-1 m-1 md:left-0 lg:m-3 top-0 pointer-events-none text-gray-400"
            >
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
          </div>

          <nav class="flex group text-white px-5 items-center space-x-4">
            <button
              class="hover:text-gray-600 text-base normal-case font-bold font-inter leading-normal tracking-[0.64px] text-[#EAEAEA] flex relative group-hover:text-black z-10"
            >
              Categories
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-chevron-down"
              >
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
          </nav>
        </div>
      </div>

      <Nav />
    </header>
</template>