<template>
    <div class="container">
        <adminHeader />


        <div id="menu">
            <ul>
                <li><a href="#menu-1">Site setting</a></li>
                <li><a href="#menu-2">Page setting</a></li>
                <li><a href="#menu-3">Media</a></li>
                <li><a href="#menu-4">Upload</a></li>
            </ul>
            <div id="menu-1">
                <input type="text" v-model="currentSettings.title" name="title" id="" placeholder="Site title">
                <br>
                <input type="text" name="tagline" id="" placeholder="Site tagline" v-model="currentSettings.tagline">
                <br>
                <input type="text" name="loginURL" id="" placeholder="Login URL" v-model="currentSettings.loginURL">
                <br>
                <input type="text" name="faviconLink" id="" placeholder="Login URL" v-model="currentSettings.faviconLink">
                <br>
                <label for="homepageURL">Homepage:</label>
                <select v-model="currentSettings.homepageURL" name="homepageURL" id="">
                    <option v-for="page in pages" :key="page.id" :value="page.url">{{page.title}}</option>
                </select>
                <br>
                <br>
                <label for="errorpageURL">Error page:</label>
                <select v-model="currentSettings.errorpageURL" name="errorpageURL" id="">
                    <option v-for="page in pages" :key="page.id" :value="page.url">{{page.title}}</option>
                </select>

                <div class="button">
                    <button @click="saveSettings" class="">Save Settings ⚡</button>
                </div>
            </div>
            <div id="menu-2">
                <div class="container">
                    <br>
                    <label for="page">Select Page:</label>
                    <select name="id" v-model="currentPage.id" @change="editPage">
                        <option v-for="page in pages" :key="page.id" :value="page.id">{{page.title}}</option>
                    </select>
                    <br>
                    <br>
                    <input type="text" name="title" id="" placeholder="Page title" v-model="currentPage.title">
                    <br>
                    <input type="text" name="url" id="" placeholder="Page URL" v-model="currentPage.url">
                    <br>
                    <input type="text" name="type" id="" placeholder="Page type" v-model="currentPage.type">
                    <br>
                    <textarea  name="headerCode" id="" placeholder="Header code"
                        v-model="currentPage.headerCode" />
                    <br>
                    <textarea name="body" placeholder="Body code " v-model="currentPage.body" />
                    <br>
                    <textarea  name="footerCode" id="" placeholder="Footer code" v-model="currentPage.footerCode" />
                <br>

                <div class="button">
                    <button @click="savePage" class="">Update page ⚡</button>
                </div>
                </div>
            </div>
            <div id="menu-3">
               <div class="container">

                   


                   <div v-for="file in media" :key="file.id">

                        <!-- For Iamge -->
                        <a :href="file.link" data-lightbox="image-1" :data-title="file.title">
                            <div v-if="file.type == 'image'" class="file">
                            <div class="thumb" :style="{ backgroundImage: 'url(' + file.link + ')' }"></div>
                            <p>{{ file.title}} </p> <a @click.prevent="copyButton"  :href="file.link"  > copy <i class="icofont-link"></i> </a>
                        </div>
                        </a>

                        <!-- For Video  -->
                        <div v-if="file.type == 'video' " class="file">
                        <div class="thumb"></div>
                        <video class="video" :src="file.link" controls loop playsinline muted></video>
                        <p>{{ file.title}} </p> <a @click.prevent="copyButton" :href="file.link" > 
                             <i href="/media" class="icofont-link"></i> 
                        </a>
                   </div>
                   </div>
                  

                   
                  
               </div>
            </div>
            <div id="menu-4">
                <p>File upload</p>
                <input type="file" name="file" id="" placeholder="Select your file">
                <br>
                <div class="button">
                    <button>Upload</button>
                </div>
                <p>0%</p>
            </div>
        </div>

        
    </div>

</template>



<script>
    import axios from 'axios'
    import adminHeader from './Admin/Header.vue'
    export default {
        components: {
            adminHeader
        },
        data() {
            return {
                site: {
                    title: null,
                    tagline: null,
                    faviconLink: null, 
                    loginURL: null,
                    homepageURL: null, 
                    errorpageURL: null
                }, 
                pages: null, 
                currentPage: {
                    id: null, 
                    title: null, 
                    url: null, 
                    type: null, 
                    headerCode: null, 
                    body: null, 
                    footerCode: null
                }, 
                currentSettings: {
                    title: null,
                    tagline: null,
                    faviconLink: null, 
                    loginURL: null,
                    homepageURL: null, 
                    errorpageURL: null
                },
                media: [
                    {
                        id: 1, 
                        title: 'PNS', 
                        link: '/media/pns.jpg', 
                        type: 'image'
                    },
                    {
                        id: 2, 
                        title: 'Cats', 
                        link: '/media/1.png', 
                        type: 'image'
                    },
                    {
                        id: 3, 
                        title: 'Home Listing', 
                        link: '/media/2.jpg', 
                        type: 'image'
                    },
                    {
                        id: 4, 
                        title: 'Dummis', 
                        link: '/media/3.jpg', 
                        type: 'image'
                    },
                    {
                        id: 5, 
                        title: 'Dummis', 
                        link: '/media/video1.mp4', 
                        type: 'video'
                    },
                    {
                        id: 6, 
                        title: 'Dummis', 
                        link: '/media/video2.mp4', 
                        type: 'video'
                    },
                    {
                        id: 7, 
                        title: 'Dummis', 
                        link: '/media/video3.mp4', 
                        type: 'video'
                    },
                    {
                        id: 8, 
                        title: 'Dummis', 
                        link: '/media/video1.mp4', 
                        type: 'video'
                    },
                    
                    
                ]
            }
        },
        computed:{
            
        },
        methods: {
            editPage:   function () {
                // console.log(this.currentPage)
                this.currentPage.id = this.pages[this.currentPage.id-1].id 
                this.currentPage.title = this.pages[this.currentPage.id-1].title 
                this.currentPage.type = this.pages[this.currentPage.id-1].type 
                this.currentPage.url = this.pages[this.currentPage.id-1].url
                this.currentPage.headerCode = this.pages[this.currentPage.id-1].headerCode
                this.currentPage.body = this.pages[this.currentPage.id-1].body
                this.currentPage.footerCode = this.pages[this.currentPage.id-1].footerCode
            }, 
            fetchPage: function(){
                axios.get('api/v1/pages').then(res=>{
                    this.pages = res.data.pages
                    console.log(res)
                })
            },
            fetchSettings: function (){
                axios.get('api/v1/settings').then(res=>{
                 this.currentSettings.title = res.data.title   
                 this.currentSettings.tagline = res.data.tagline   
                 this.currentSettings.faviconLink = res.data.faviconLink   
                 this.currentSettings.loginURL = res.data.loginURL   
                 this.currentSettings.homepageURL = res.data.homepageURL   
                 this.currentSettings.errorpageURL = res.data.errorpageURL   

                 console.log(res)
                }).then(()=>{
                    this.fetchPage()
                    
                })
                 console.log('Before mount')
            }, 
            saveSettings: function (){
                console.log('save settings')
                axios.put('api/v1/settings',{
                    title : this.currentSettings.title, 
                    tagline : this.currentSettings.tagline, 
                    faviconLink: this.currentSettings.faviconLink, 
                    loginURL: this.currentSettings.loginURL,
                    homepageURL: this.currentSettings.homepageURL, 
                    errorpageURL: this.currentSettings.errorpageURL
                }).then(res=>{
                    console.log(res.data)
                })
            }, 
            savePage: function (){
                console.log('save Page')
                axios.put('api/v1/pages',{
                    id : this.currentPage.id, 
                    title : this.currentPage.title, 
                    type : this.currentPage.type, 
                    url: this.currentPage.url, 
                    headerCode: this.currentPage.headerCode,
                    body: this.currentPage.body, 
                    footerCode: this.currentPage.footerCode
                }).then(res=>{
                    console.log(res.data)
                }).catch(err=>{
                    console.log(err)
                })
            }
        },
        beforeMount(){
               this.fetchSettings()
            
        }

    }

</script>



<style lang="scss" scoped>
$color: black;
$color2: pink;
$radius: .35rem;
$border-width: 2px;
$color-bg: white;
$offset: .5rem;
$transition: .3s;
    #menu-1 {
        input[type="text"] {
            margin: 5px;
            border: 1px dotted #958e8e;
            outline: none;
            padding: .3em .7em;
            border-radius: 5px;
            color: #685555;
            font-weight: 291;
        }
        
    }
    #menu-2 {
        .container{

            padding: 1em 2em;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

            input[type="text"] {
            margin: 5px;
            border: 1px dotted #958e8e;
            outline: none;
            padding: .3em .7em;
            border-radius: 5px;
            color: #685555;
            font-weight: 291;

            }
            textarea{
             margin: 5px;
            border: 1px dotted #958e8e;
            outline: none;
            padding: .3em .7em;
            border-radius: 5px;
            color: #685555;
            font-weight: 291;
            width: 500px; 
            resize: vertical;
            }


        }
    }

    #menu-3{
        .container{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-gap: 10px;

            .file{
                box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
                position: relative; 
                .thumb{ 
                    min-height: 150px;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-origin: content-box;
                    overflow: hidden;
                }
                video{
                    
                    position: absolute; 
                    object-fit: cover; 
                    top:0; 
                    width: 100%;
                    height: 150px;
                }
                p{
                    padding: .3em .7em;
                    font-size: 1.2em;
                    text-transform: uppercase;
                    font-weight: 300;
                    display: inline-block;
                }
                a{
                    text-decoration: none;
                    display: inline-block;
                    font-size: .7em;
                    transition: all 300ms ease;
                    &:hover{
                        color: rgb(83, 163, 87); 
                        transform: scaleX(.9);
                    }
                }
            }
        }
    }

    #menu-4{
        input{
            margin: 5px;
            border: 1px dotted #958e8e;
            outline: none;
            padding: .3em .7em;
            border-radius: 5px;
            color: #685555;
            font-weight: 291;
        }
    }
   .button{
       padding: 3em 2em;

       button{
           padding: .5em .9em;
           box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
           outline: none;
           border: 1px solid gray;
           border-radius: 3px;
           background-color: white;
           &:hover{
            cursor: pointer;     
           }
       }
   }
</style>
