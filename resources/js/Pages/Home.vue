<script setup>
    import Layout from '../Layouts/Layout.vue';
    import {  useForm } from '@inertiajs/vue3';
    import FooterLink from '../Includes/FooterLink.vue';
    import Ads from '../Includes/Ads.vue';

    defineOptions({ layout : Layout });


    defineProps({
        name: {
            type: String
        },
        age: {
            type: Number
        },
        gender: {
            type: String
        },
        data: {
            type: Object
        },
        sidePost: {
        type: Object
        }
    });

    const form = useForm({
        email: "" 
        });

        const subscribeGuest = () => {
        form.post(route("subscribe"), {
            onSuccess: () => {
            form.reset();
            alert('successfully subscribed')
            }
        })
        }

        const  withBrTags = (content) => {
            const doc = content
            return doc.replace(/(\\r)*\\n/g, '<br>')
        }
</script>

<template>
    <Head :title="` ${$page.component}`">
        <meta head-key="description" name="description" :content="`Hello wworld it is the ${$page.component}`" >
    </Head>
    
    <main class="bg-[#181C1F]">
            <div class="bg-[#0C0E0F]">
              <div class="container mx-auto my-auto">
                <div class="gap-4 grid grid-cols-1 lg:grid-cols-2">
                  <div class="w-full py-16">
                    <div
                      class="flex px-3 md:px-10 flex-col items-center justify-center"
                    >
                      <div class="px-2">
                        <img
                          :src="data.image"
                          alt=""
                          class="lg:w-[535.03px] w-[311px] h-[355.74px] lg:h-[361.19px] object-cover rounded-2xl"
                        />
                        <div
                          class="flex text-left lg:w-[535.034px] lg:h-auto w-[311px] h-[355.74px] bg-[#21272A] px-3 rounded-2xl mt-2 text-white flex-col"
                        >
                          <h3
                            class="lg:text-[21.618px] text-[15px] font-karla text-[#EAEAEA] font-bold py-2"
                          >
                             {{ data.title  }}
                          </h3>
                          <div v-html="withBrTags( data.content )"  class="text-[#AFB5C0] font-inter text-[10px] lg:text-[16.213px] font-medium py-2">
                            
                          </div>
                          <div class="flex items-center justify-between">
                            <div class="flex pb-3 items-center">
                              <div
                                class="w-[43.884px] h-[43.884px] rounded-[43.884px] flex-shrink-0 overflow-hidden"
                              >
                                <img
                                  class="w-full h-full object-cover"
                                  :src="'/author/author_avatar.jpg'"
                                  alt="Avatar"
                                />
                              </div>
                              <div class="ml-3">
                                <h3
                                  class="lg:text-[11.901px] text-[10px] text-[#737373] font-Rubik font-semibold"
                                >
                                  {{ data.user.name  }} 
                                </h3>
                                <p
                                  class="lg:text-[10px] text-[8px] text-[#737373] font-inter font-semibold"
                                >
                                  {{ new Date(data.user.created_at).toLocaleString() }}
                                </p>
                              </div>
                            </div>
                            <p
                              class="text-[#737373] font-Rubik text-[10px] lg:text-[10.413px] font-semibold"
                            >
                            3 mins read
                            <br>
                            <Link :href="'/post/' +data.slug">Read MORE</Link>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="w-full">
                    <div class="flex justify-center lg:mt-24 items-center flex-col">
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div v-for="post in sidePost" :key="post.id" class="flex space-x-2 flex-row md:flex-col items-center justify-center">
                          <img
                            :src="post.image"
                            alt=""
                            class="lg:w-[291px] w-[102px] h-[65px] lg:h-[80px] md:w-full md:h-32 md:object-cover rounded-2xl"
                          />

                          
                          <div
                            class="flex flex-col w-[201px] h-[68px] md:h-auto md:w-[291px] bg-[#21272A] rounded-[10px] text-white lg:mt-2 px-2 md:p-[1.861px_10.97px_10.97px_10.97px] items-start flex-shrink-0"
                          >
                            <h3
                              class="lg:text-sm text-[10px] text-[#EAEAEA] font-karla font-bold py-2"
                            >
                              {{ post.title }}
                            </h3>
      
                            <div
                              class="flex pb-2 items-center w-full justify-between"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-[14.467px] h-[14.467px] md:w-[28.133px] md:h-[28.133px] flex-shrink-0 rounded-full overflow-hidden"
                                >
                                  <img
                                    class="w-full h-full object-cover"
                                    :src="'/author/author_avatar.jpg'"
                                    alt="Avatar"
                                  />
                                </div>
                                <div class="md:ml-3 ml-1">
                                  <h3
                                    class="lg:text-xs text-[8px] text-[#737373] font-inter font-semibold"
                                  >
                                  {{ post.user.name  }} 
                                  </h3>
                                  <p
                                    class="lg:text-[10px] text-[6px] text-[#737373] font-inter font-semibold"
                                  >
                                   {{ new Date(post.created_at).toLocaleString() }}
                                  </p>
                                </div>
                              </div>
                              <div class="">
                                <p
                                  class="lg:text-xs text-[6.171px] font-inter font-semibold text-[#737373] md:text-sm"
                                >
                                  3 mins read
                                  <br>
                                  <Link :href="'/post/' +post.slug">Read MORE</Link>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        class="bg-[#21272A] my-3 rounded-[5.025px] lg:rounded-[9.158px] flex flex-col w-[300px] h-[46.087px] p-[3.841px] lg:w-[483px] lg:h-[84px] lg:p-[7px] justify-center items-center gap-[3.841px] lg:gap-[7px] flex-shrink-0"
                      >
                      <form @submit.prevent="subscribeGuest()">
                        <div class="flex bg-gray-700 my-4 relative">
                          
                            <input 
                              v-model="form.email"
                              type="text"
                              placeholder="Your email address..."
                              class="flex w-[200.749px] h-[28.641px] lg:w-[300.09px] bg-transparent rounded-[10.506px] border-[#737373] border-[1.16px] lg:h-[52.202px] p-[0px_0.035px_0px_15.559px] lg:p-[0px_0.065px_0px_28.357px] justify-end items-center flex-shrink-0"
                            />
                            <inputError />
                            <button
                              type="submit"
                              class="flex text-[var(--Light,#FAFCFE)] text-[10.504px] w-[72.971px] font-inter lg:text-[19.144px] font-bold uppercase tracking-[0.766px] h-[28.324px] flex-col lg:w-[133px] lg:h-[51.625px] bg-[#00B172] p-[14.358px_28.717px] justify-center items-center gap-[9.572px] flex-shrink-0 rounded-[9.572px]"
                              style="margin-left: -6px"
                            >
                              Subscribe
                            </button>
                          
                          
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <Ads />
            <FooterLink />
          </main> 


</template>
<style scoped>

    .bg-dots-darker {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
    }
    @media (prefers-color-scheme: dark) {
        .dark\:bg-dots-lighter {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
        }
    }

</style>