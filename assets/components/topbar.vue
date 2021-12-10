<template>
    <nav>
        <div>Activities</div>
        <div>{{ nowTime }}</div>
        <div>Settings</div>
    </nav>
</template>

<script type="application/javascript">
export default {
    name: "topbar",
    data () {
        return {
        nowTime: null,
        nowTimeStamp: null,
        tsFormatter: Intl.DateTimeFormat('fr', { month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' })
        }
    },
    methods: {
        formatTimestamp (ts) {
            // console.log(ts);
            return this.tsFormatter.format(ts);
        },
        dateNow () {
            this.nowTimeStamp = Date.now();
            setInterval (() => {
                this.nowTimeStamp = Date.now();
            }, 1000)
        },
    },    
    watch: {
        nowTimeStamp (newVal, oldVal) {
            // console.log(newVal, oldVal);
            this.nowTime = this.formatTimestamp(newVal);
        },
    },
    beforeMount(){
        this.dateNow();
    }
};
</script>

<style scoped>
    nav{
        height: 30px;
        background:  #171614;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 10px;
    }
</style>