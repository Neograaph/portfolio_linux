<template>
    <nav>
        <div class="activities">{{ this.pseudo ? this.pseudo: 'Activities' }}</div>
        <div>{{ nowTime }}</div>
        <div>
            <div class="svgContainer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>
    </nav>
</template>

<script type="application/javascript">
export default {
    name: "topbar",
    data () {
        return {
        nowTime: null,
        nowTimeStamp: null,
        pseudo: null,
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
    .svgContainer{
        display: flex;
        align-items: center;
        gap: 10px;
        padding-right: 5px;
    }
    .svg{
        height: 15px;
    }



    /* mobile */
    @media (max-width: 550px) {
    .activities{
        display: none;
    }
    .svgContainer{
        display: none;
    }
  }
</style>