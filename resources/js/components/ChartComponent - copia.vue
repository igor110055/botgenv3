<template>
  <div id="app" ref="chartContainer"></div>
</template>

<script>
import { createChart, PriceScaleMode } from "lightweight-charts";
import moment from "moment";
import axios from "axios";
export default {
  data: () => ({
    chart: null,
    datas1: [],
    dataChart: [],


  }),





 methods: {
        fetchPricess() {
         
            axios.get('/getPricesbysymbol/BTCUSDT').then(response => {
                //Save the response in the messages array to display on the chat view
                this.datas1 = response.data;
              
            });
        },

    },




created() {


const chart = createChart(this.$refs.chartContainer, { width: 400, height: 300 });
const lineSeries = chart.addLineSeries();
lineSeries.setData([
    { time: '2019-04-11', value: 80.01 },
    { time: '2019-04-12', value: 96.63 },
    { time: '2019-04-13', value: 76.64 },
    { time: '2019-04-14', value: 81.89 },
    { time: '2019-04-15', value: 74.43 },
    { time: '2019-04-16', value: 80.01 },
    { time: '2019-04-17', value: 96.63 },
    { time: '2019-04-18', value: 76.64 },
    { time: '2019-04-19', value: 81.89 },
    { time: '2019-04-20', value: 74.43 },
]);





 // this.fetchPricess();

 axios.get("getPricesbysymbol/ETHUSDT")
      .then(response => {
        this.dataChart = response.data;
      
      })
      .catch(e => {
        this.errors.push(e);
      });

    
  },



  mounted() {

 
    this.datas1 =[[1654270114,"29431.00"],[1654271298,"29472.00"],[1654271896,"29507.00"],[1654272131,"29508.00"],[1654272461,"29506.00"],[1654273059,"29462.00"],[1654278208,"29444.00"],[1654278401,"29452.00"],[1654278428,"29477.00"],[1654278703,"29519.00"],[1654278718,"29516.00"],[1654278773,"29525.00"],[1654278786,"29522.00"],[1654278821,"29524.00"],[1654278950,"29502.00"],[1654278992,"29514.00"],[1654279027,"29500.00"],[1654279041,"29501.00"],[1654279095,"29514.00"],[1654279241,"29487.00"],[1654279393,"29511.00"]];





/**


console.log(this.datas1)

console.log(777)
    this.chart = createChart(this.$refs.chartContainer, {
      width: this.$refs.chartContainer.offsetWidth,
      height: 210,

        priceScale: {
    borderColor: "rgba(197, 203, 206, 0.8)",
    size: 5,
  },
  timeScale: {
    borderColor: "rgba(197, 203, 206, 0.8)",
    timeVisible: true,
    secondsVisible: true,
    rightBarStaysOnScroll: true,
  },


      rightPriceScale: {
        scaleMargins: {
          top: 0.1,
          bottom: 0.1,
        },
        mode: PriceScaleMode.Logarithmic,
      },
    });
    const lineSeries = this.chart.addLineSeries({
      color: "rgba(38, 198, 218, 1)",
      lineWidth: 2,
    });
    lineSeries.setData(
      this.datas1.map((item) => ({
        time: item[0],
        value: item[1],
      }))
    );

    **/
  },
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
