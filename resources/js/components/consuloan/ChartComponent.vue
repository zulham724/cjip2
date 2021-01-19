<template>
<div>
    <section class="flat-row padingbotom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 history-text">
                        <div class="title-section style3 left">
                            <div class="display-1">{{TranslateModule.contents.economygrow}}</div>
                            <hr style="border: 5px solid orange;border-radius: 5px;width: 100px;">
                        </div>
                        <p style="text-align:justify">
                            {{TranslateModule.contents.economygrowdesc}}
                        </p>
                    </div>
                    <div class="col-lg-6 history-text">
                        <div class="title-section style3 left">
                            <div class="display-1">{{TranslateModule.contents.investperform}}</div>
                            <hr style="border: 5px solid orange;border-radius: 5px;width: 100px;">
                        </div>
                        <p style="text-align:justify">
                            {{TranslateModule.contents.investperformdesc}}
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div id="chart" ref="chart"></div>
                    </div>
                    <div class="col-lg-6">
                        <div id="chart2" ref="chart2"></div>
                    </div>
                </div>
            </div>
        </section>
</div>
</template>

<script>
import {mapState} from 'vuex'
var Highcharts = require('highcharts')
require('highcharts/modules/exporting')(Highcharts)
export default {
    data(){
        return {
            chart:{
                description: 'Pertumbuhan Ekonomi Jawa Tengah',
                label: [],
                data: []
            },
            chart2:{
                description: 'Target dan Realisasi Jawa Tengah',
                label: [],
                data: []
            }
        }
    },
    watch:{
        'TranslateModule.to':{
            handler:function(){
                if(this.TranslateModule.to.value == 'id'){
                    this.chart.description = 'Pertumbuhan Ekonomi Jawa Tengah'
                    this.chart2.description = 'Target dan Realisasi Jawa Tengah'
                }
                if(this.TranslateModule.to.value == 'en'){
                    this.chart.description = 'Central Java Economic Growth'
                    this.chart2.description = 'Central Java Target and Realization'
                }
                this.getPertumbuhanEkonomis()
                this.getEconomicGrowth()
            },
            deep: true
        }
    },
    computed:{
        ...mapState(['SettingModule','AuthModule','TranslateModule','EconomicGrowth'])
    },
    mounted(){
        this.getPertumbuhanEkonomis()
        this.getEconomicGrowth()
    },
    methods:{
        getEconomicGrowth(){
            this.$store.dispatch('EconomicGrowth/index').then(res=>{
                this.chart2.data = [{
                    name:'Target',
                    data:[]
                },{
                    name:'Realization',
                    data:[]
                }]
                res.data.forEach(item=>{
                    this.chart2.label.push(item.year)
                    this.chart2.data[0].data.push(parseInt(item.target))
                    this.chart2.data[1].data.push(parseInt(item.realization))
                })
                Highcharts.chart('chart2', {
                    chart: {
                        type: 'bar',
                        backgroundColor: null
                    },
                    title: {
                        text: this.chart2.description
                    },
                    xAxis: {
                        categories: this.chart2.label
                    },
                    yAxis: {
                        title: {
                            text: 'Investment Performance'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [
                        {
                            name: 'Target',
                            data: this.chart2.data[0].data
                        },{
                            name: 'Realization',
                            data: this.chart2.data[1].data
                        }
                    ]
                })
            })
        },
        getPertumbuhanEkonomis(){
            this.chart.data = []
            this.chart.label = []
            this.$store.dispatch('getPertumbuhanEkonomis').then(res=>{
                res.data.forEach(item=>{
                    this.chart.label.push(item.tahun)
                    this.chart.data.push(Math.abs(item.pertumbuhan.replace(',', '.')))
                })
                Highcharts.chart('chart', {
                    chart: {
                        type: 'line',
                        backgroundColor: null
                    },
                    title: {
                        text: this.chart.description
                    },
                    xAxis: {
                        categories: this.chart.label
                    },
                    yAxis: {
                        title: {
                            text: 'Growth'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                        name: this.chart.description,
                        data: this.chart.data
                    }]
                })
            })
        }
    }
}
</script>

<style>

</style>
