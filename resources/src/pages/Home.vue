<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
    </div>
</div>
</template>

<script>
import Breadcrumb from '../components/breadcrumb/index'
export default {
    components: {
        Breadcrumb
    },
    data() {
        return {
            subHeader: {
                links: [{
                    name: 'Trang Chủ',
                    url: '/',
                }, ],
                action: {
                    url: '/',
                    icon: '',
                    text: 'Trang chủ',
                },
            },
        }
    },
}
</script>
