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
                <input type="text" name="title" id="" placeholder="Site title" :value="site.title ? site.title : ''">
                <br>
                <input type="text" name="tagline" id="" placeholder="Site title"
                    :value="site.tagline ? site.tagline : ''">
                <br>
                <input type="text" name="loginURL" id="" placeholder="Site title"
                    :value="site.loginURL ? site.loginURL : ''">
                <br>
                <label for="cars">Homepage:</label>
                <select name="cars" id="cars">
                    <option v-for="page in pages" :key="page.id" :value="page.url">{{page.title}}</option>
                </select>
                <br>
                <br>
                <label for="cars">Error page:</label>
                <select name="cars" id="cars">
                    <option v-for="page in pages" :key="page.id" :value="page.url">{{page.title}}</option>
                </select>
            </div>
            <div id="menu-2">
                <div class="container">
                    <br>
                    <label for="page">Select Page:</label>
                    <select name="page" v-model="currentPage.id" @change="editPage">
                        <option v-for="page in pages" :key="page.id" :value="page.id">{{page.title}}</option>
                    </select>
                    <br>
                    <br>
                    <input type="text" name="title" id="" placeholder="Page title" :value="currentPage.title">
                    <br>
                    <input type="text" name="type" id="" placeholder="Page type" :value="currentPage.type">
                    <br>
                    <textarea type="text" name="header" id="" placeholder="Header code" :value="currentPage.headerCode" />
                    <br>
                    <textarea name="body" placeholder="Body code " :value="currentPage.body" />
                    <br>
                    <textarea type="footer" name="title" id="" placeholder="Footer code" :value="currentPage.footerCode" />
                <br>
                </div>
            </div>
            <div id="menu-3">
               <div class="container">

                   


                   <div v-for="file in media" :key="file.id">

                        <!-- For Iamge -->
                        <a :href="file.link" data-lightbox="image-1" :data-title="file.title">
                            <div v-if="file.type == 'image'" class="file">
                            <div class="thumb" :style="file.url "></div>
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

        <div class="button">
            <button class="">Save ⚡</button>
        </div>
    </div>

</template>



<script>
    import adminHeader from './Admin/Header.vue'
    export default {
        components: {
            adminHeader
        },
        data() {
            return {
                site: {
                    title: null,
                    tagline: 'The best site builder',
                    loginURL: 'letmein'
                }, 
                pages: [
                    {
                        id: 1, 
                        title: 'Cart', 
                        url: '/cart', 
                        headerCode: "Cart Header Code", 
                        body: 'car Body code', 
                        footerCode: " cart   Footer code"

                    }, 
                    {
                        id: 2, 
                        title: 'Blog', 
                        url: '/blog', 
                        headerCode: "Blog Header Code", 
                        body: 'Blog Body code', 
                        footerCode: "Blog Footer code"

                    },
                    {
                        id: 3, 
                        title: 'Portfolio', 
                        url: '/portfolio', 
                        headerCode: "Portfolio Header Code", 
                        body: 'Portfolio Body code', 
                        footerCode: "Portfolio Footer code"

                    }
                ], 
                currentPage: {
                    id: '', 
                    title: '', 
                    type: '', 
                    headerCode: '', 
                    body: '', 
                    footerCode: ''
                }, 
                media: [
                    {
                        id: 1, 
                        title: 'PNS', 
                        url: `background-image: url(${"/media/pns.jpg"})`,
                        link: '/media/pns.jpg', 
                        type: 'image'
                    },
                    {
                        id: 2, 
                        title: 'Cats', 
                        url: `background-image: url(${"/media/1.png"})`,
                        link: '/media/1.png', 
                        type: 'image'
                    },
                    {
                        id: 3, 
                        title: 'Home Listing', 
                        url: `background-image: url(${"/media/2.jpg"})`,
                        link: '/media/2.jpg', 
                        type: 'image'
                    },
                    {
                        id: 4, 
                        title: 'Dummis', 
                        url: `background-image: url(${"/media/3.jpg"})`,
                        link: '/media/3.jpg', 
                        type: 'image'
                    },
                    {
                        id: 5, 
                        title: 'Dummis', 
                        url: '/media/video1.mp4',
                        link: '/media/video1.mp4', 
                        type: 'video'
                    },
                    {
                        id: 6, 
                        title: 'Dummis', 
                        url: '/media/video1.mp4',
                        link: '/media/video2.mp4', 
                        type: 'video'
                    },
                    {
                        id: 7, 
                        title: 'Dummis', 
                        url: '/media/video1.mp4',
                        link: '/media/video3.mp4', 
                        type: 'video'
                    },
                    {
                        id: 8, 
                        title: 'Dummis', 
                        url: '/media/video1.mp4',
                        link: '/media/video1.mp4', 
                        type: 'video'
                    },
                    
                    
                ]
            }
        },
        methods: {
            saveAll: function(){
                console.log(this.currentPage)
            }, 
            editPage:   function () {
                console.log(this.currentPage)
                this.currentPage.title = this.pages[this.currentPage.id-1].title 
                this.currentPage.headerCode = this.pages[this.currentPage.id-1].headerCode
                this.currentPage.body = this.pages[this.currentPage.id-1].body
                this.currentPage.footerCode = this.pages[this.currentPage.id-1].footerCode
            }
        },
        computed: {
            
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
