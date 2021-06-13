<template>
<div class="flex-row-fluid d-flex flex-column ml-lg-12">
    <div class="d-flex flex-column flex-grow-1">
        <div class="card card-custom gutter-b">
            <div class="card-body d-flex align-items-center justify-content-between flex-wrap py-3">
                <div class="d-flex align-items-center mr-2 py-2">
                    <h3 v-if="!prevDir" class="font-weight-bold mb-0 mr-10">Tệp Tin</h3>
                    <a v-else v-for="(action, i) in detacheDirectory()" :key="i" @click="toDirectory(action.url)" class="btn btn-light font-weight-bolder btn-sm mr-2">
                        <i class="icon-sm ki ki-long-arrow-back"></i>
                        {{ action.name }}
                    </a>
                </div>
                <div class="symbol-group symbol-hover py-2">
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-hor"></i>
                            </a>
                            <a v-if="getUrl" @click="returnUrl()" class="btn btn-light font-weight-bolder btn-sm">
                                <i class="icon-sm ki ki-bold-close"></i>
                                Đóng
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <ul class="navi navi-hover">
                                    <li class="navi-header font-weight-bold py-4">
                                        <span class="font-size-lg">Chức năng</span>
                                        <i class="ki ki-menu"></i>
                                    </li>
                                    <li class="navi-separator mb-3 opacity-70"></li>
                                    <li class="navi-item">
                                        <a @click="showfolder = true" class="navi-link">
                                            <i class="fa far text-warning fa-folder mr-5"></i>
                                            <span class="navi-text">Thêm folder</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a @click="showDropzone = true" class="navi-link">
                                            <i class="fa far text-warning fa-file-image mr-6"></i>
                                            <span class="navi-text">Thêm tệp tin</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <transition name="bounce">
            <div v-if="showfolder" class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Thêm Folder</h3>
                </div>
                <form>
                    <ValidationObserver ref="errors">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">Tên folder</label>
                                <div class="col-10">
                                    <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                        <input v-model="foldel" class="form-control" type="text" placeholder="Tên folder" id="name" />
                                        <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                    </validation-provider>
                                </div>
                            </div>
                        </div>
                    </ValidationObserver>
                </form>
                <div class="card-footer">
                    <button @click="createFolder()" type="reset" class="btn btn-primary mr-2">Thêm Fooder</button>
                    <button @click="showfolder = false" type="reset" class="btn btn-secondary">Đóng</button>
                </div>
            </div>
        </transition>
        <transition name="bounce">
            <div v-show="showDropzone" class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Thêm Tệp Tin</h3>
                </div>
                <form>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Uploads tệp tin</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Kéo Thả tệp tin của bạn vào đây.</h3>
                                    <span class="dropzone-msg-desc">Hoặc nhấp vào để tải lên!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="card-footer">
                    <button @click="listenQueue()" id="submit-all" type="reset" class="btn btn-primary mr-2">Đăng tải</button>
                    <button @click="showDropzone = false" type="reset" class="btn btn-secondary">Đóng</button>
                </div>
            </div>
        </transition>
        <div class="row">
            <div v-for="(image, i) in images" :key="i" class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="card card-custom gutter-b card-stretch">
                    <div class="card-header border-0">
                        <h3 class="card-title"></h3>
                        <div class="card-toolbar">
                            <div class="dropdown dropdown-inline">
                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ki ki-bold-more-hor"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-center">
                                    <ul v-if="image.type == 'dir'" class="navi navi-hover py-5">
                                        <li class="navi-item">
                                            <a @click="destroyDirectory(image.path)" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fa far fa-trash-alt"></i>
                                                </span>
                                                <span class="navi-text">Xóa</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul v-else class="navi navi-hover py-5">
                                        <li v-if="getUrl" class="navi-item">
                                            <a @click="returnUrl(image.path)" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fa la-check"></i>
                                                </span>
                                                <span class="navi-text">Chọn ảnh</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a :href="domain + image.path" target="_blank" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </span>
                                                <span class="navi-text">Preview</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a @click="Clipboard(domain + image.path)" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fas fa-link"></i>
                                                </span>
                                                <span class="navi-text">Coppy liên kết</span>
                                            </a>
                                        </li>
                                        <li v-if="!getUrl" class="navi-item">
                                            <a :href="'/api/images/download?path=' + image.path" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fas fa-file-download"></i>
                                                </span>
                                                <span class="navi-text">Tải về</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a @click="destroyFile(image.path)" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fa far fa-trash-alt"></i>
                                                </span>
                                                <span class="navi-text">Xóa</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center overflow-hidden">
                            <span @click="toDirectory(image.path)" v-if="image.type == 'dir'">
                                <i class="fa far text-warning fa-folder icon-5x"></i>
                            </span>
                            <img v-else class="max-h-65px" :src="domain + image.path" />
                            <a href="#" class="text-dark-75 font-weight-bold mt-15 font-size-lg" v-text="image.basename"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Extends from '../../extend';
import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
// // toastr.options = { "progressBar": true, "positionClass": "toast-top-right" };
extend('required', {
    ...required,
    message: 'Không được để trống'
});
extend('length', {
    validate(value, { min, max }) {
        return value.length >= min && value.length <= max;
    },
    params: ['min', 'max'],
    message: 'Độ dài không hợp lệ'
});
var queue = [];
var directory = '';
export default {
    components: { ValidationProvider, ValidationObserver },
    props: ["getUrl"],
    data() {
        return {
            domain: 'https://cdn.sieuthitamlinhsala.vn/',
            images: [],
            prevDir: '',
            showfolder: false,
            showDropzone: false,
            foldel: ''
        }
    },
    mounted() {
        Extends.LoadPage()
        axios('/api/images').then(res => {
            this.images = res.data
            KTApp.unblockPage();
            KTUtil.ready(function () {
                $("#kt_dropzone_2").dropzone({
                    url: "/api/images",
                    autoProcessQueue: false,
                    parallelUploads: 100,
                    uploadMultiple: true,
                    headers:{"Authorization":'Bearer ' + localStorage.getItem('token')},  
                    init: function() {
                        var myDropzone = this;
                        $("#submit-all").click(function (e) {
                            myDropzone.processQueue();
                        }); 
                        this.on("sending", function(file, xhr, formData) {
                            formData.append("dir", directory);
                        });
                        this.on("success", function(file) {
                            let image = {
                                type: 'file',
                                path: directory.substring(1) + '/' + file.name,
                                timestamp: Math.floor(Date.now() / 1000),
                                basename: file.name,
                                filename: file.name,
                            }
                            queue.push(image)
                        });
                    }
                });
            });
        })
    },
    methods: {
        listenQueue() {
            if (queue != '') {
                this.images = [...this.images, ...queue];
                // toastr.success("Upload file thành công!")
            }
            else {
                setTimeout(() => {
                    this.listenQueue()
                }, 1000);
            }
        },
        returnUrl(path = false) {
            if (path) {
                this.$emit("url", this.domain + path);
            }
            else {
                this.$emit("url", '');
            }
        },
        detacheDirectory () {
            let combinedArr = [
                {
                    name: 'Quay lại',
                    url: '',
                }
            ];
            let listAction = [];
            let temp = '';
            let action = this.prevDir.split('/');
            action.forEach(url => {
                if (temp) {
                    temp = temp + '/' + url
                }
                else {
                    temp = url
                }
                listAction.push(temp)
            });
            for (let i = 0; i < action.length; i++) {
                let item = {
                    name: action[i],
                    url: listAction[i],
                }
                combinedArr.push(item)
            }
            return combinedArr.splice(0, combinedArr.length-1);
        },
        toDirectory(dir) {
            Extends.LoadPage()
            axios('/api/images?dir=' + dir).then(res => {
                this.images = res.data
                this.prevDir = dir
                directory = this.prevDir
                console.log(this.prevDir)
                KTApp.unblockPage();
            })
        },
        async createFolder()  {
            if (await this.errors()) {
                let params = {
                    directory: this.prevDir + '/' + this.foldel
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.post('/api/images', params).then((res) => {
                    KTApp.unblockPage();
                    if (res.status == 200) {
                        // toastr.success("Tạo folder thành công!")
                        this.$refs['errors'].reset();
                        this.showfolder = false;
                        let folder = {
                            type: 'dir',
                            path: params.directory,
                            timestamp: Math.floor(Date.now() / 1000),
                            dirname: this.prevDir,
                            basename: this.foldel,
                            filename: this.foldel,
                        }
                        this.foldel = ''
                        this.images.push(folder)
                    }
                    else {
                        Swal.fire("Rất Tiếc!", "Đã có sự cố đã sảy ra, vui lòng thử lại sau!", "error");
                    }
                })
            }
        },
        destroyFile(path) {
            let request = {
                path: path
            }
            Extends.LoadPage()
            axios.delete('/api/images/destroy', { params: request }).then(res => {
                this.images = this.images.filter(image => image.path != path);
                KTApp.unblockPage();
                // toastr.success("Đã Xóa")
            })
        },
        destroyDirectory(dir) {
            let request = {
                dir: dir
            }
            Extends.LoadPage()
            axios.delete('/api/images/destroy', { params: request }).then(res => {
                this.images = this.images.filter(image => image.path != dir);
                KTApp.unblockPage();
                // toastr.success("Đã Xóa Thư Mục")
            })
        },
        Clipboard(path) {
            Extends.Clipboard_CopyTo(path)
            // toastr.success("Đã Coppy đường dẫn")
        },
        async errors() {
            return await this.$refs['errors'].validate();
        },
    },
}
</script>

<style>
.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .1s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
</style>