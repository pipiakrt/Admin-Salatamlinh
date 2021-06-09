<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                <div class="alert-icon">
                    <span class="svg-icon svg-icon-primary svg-icon-xl">
                        <i class="ki ki-outline-info icon-2x text-primary"></i>
                    </span>
                </div>
                <div class="alert-text">Use
                    <code>.overlay</code>component to have multi-purpose overlay components.</div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-7" v-for="item in sliders" :key="item.id">
                    <div class="card card-custom overlay">
                        <div class="card-body p-0">
                            <div class="overlay-wrapper">
                                <img :src="item.url" class="w-100 rounded" />
                            </div>
                            <div class="overlay-layer align-items-start justify-content-end pt-5 pr-5">
                                <a @click="destroy(item.id)" class="btn btn-icon btn-light-primary pulse pulse-primary">
                                    <i class="fa far fa-trash-alt"></i>
                                    <span class="pulse-ring"></span>
                                </a>
                            </div>
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
import Breadcrumb from '../../components/breadcrumb/index'
export default {
    components: {
        Breadcrumb,
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Thanh trượt',
                        url: '/thanh-truot/danh-sach',
                    },
                    {
                        name: 'Danh sách',
                        url: '/thanh-truot/danh-sach',
                    },
                ],
                action: {
                    url: '/thanh-truot/them-moi',
                    icon: 'icon-sm ki ki-plus',
                    text: 'Thêm Mới',
                },
            },
            sliders: []
        }
    },
    created() {
        Extends.LoadPage()
        axios('/api/sliders').then(res => {
            KTApp.unblockPage();
            this.sliders = res.data.data
        })
    },
    methods: {
        destroy(id) {
            Extends.LoadPage()
            axios.delete('/api/sliders/' + id).then(res => {
                KTApp.unblockPage();
                this.sliders = this.sliders.filter(item => item.id !== id)
                Swal.fire(
                    "Thành Công!",
                    "Ảnh thanh trượt đã bị xóa hoàn toàn.",
                    "success"
                )
            })
        }
    },
}
</script>