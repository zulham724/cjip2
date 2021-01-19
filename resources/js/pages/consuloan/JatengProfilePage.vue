<template>
    <div>
        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">{{TranslateModule.contents.menu2}}</h1>
                        </div>
                        <!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home">
                                    <i class="fa fa-home"></i
                                    ><a href="/home#/">Home</a>
                                </li>
                                <li>{{TranslateModule.contents.menu2}}</li>
                            </ul>
                        </div>
                        <!-- /.breadcrumbs -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.page-title -->
        <umk-table-component></umk-table-component>
        <investment-cost-table-component></investment-cost-table-component>

    </div>
</template>

<script>
import UmkTableComponent from './../../components/consuloan/UmkTableComponent'
import InvestmentCostTableComponent from './../../components/consuloan/InvestmentCostTableComponent'
import {mapState} from 'vuex'
export default {
    components:{
        UmkTableComponent,
        InvestmentCostTableComponent,
    },
    computed: {
        ...mapState(['TranslateModule'])
    },
};
</script>

<style></style>
