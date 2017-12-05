<template>
    <div ref="vscroll" :style="{ height: height,'min-height':minHeight,'max-height':maxHeight }" class="ss-container">
        <div class="ss-wrapper" ref="wrapper">
            <div class="ss-content" ref="content" @scroll="moveBar" @mouseenter="moveBar">
                <slot></slot>
            </div>
        </div>
        <div class="ss-scroll" ref="bar" :class="{'ss-grabbed':grabbed,'visible':alwaysvisible}"></div>
    </div>
</template>
<script>
export default {
    props: {
        height: null,
        minHeight: null,
        maxHeight: null,
        color: null,
        barWidth: null,
        alwaysvisible: Boolean
    },
    mounted() {
        this.dragDealer();
        this.moveBar();
    },
    data() {
        return {
            scrollRatio: 0,
            grabbed: false
        }
    },
    methods: {
        // Mouse drag handler
        dragDealer() {
            var t = this;
            var lastPageY;
            this.$refs.bar.addEventListener('mousedown', (e) => {
                lastPageY = e.pageY;
                this.grabbed = true;
                document.body.classList.add('ss-grabbed');
                document.addEventListener('mousemove', drag);
                document.addEventListener('mouseup', stop);
                return false;

                function drag(e) {
                    var delta = e.pageY - lastPageY;
                    lastPageY = e.pageY;
                    t.$refs.content.scrollTop += delta / t.scrollRatio;
                }

                function stop() {
                    t.grabbed = false;
                    document.body.classList.remove('ss-grabbed');
                    document.removeEventListener('mousemove', drag);
                    document.removeEventListener('mouseup', stop);
                }
            });
        },
        moveBar() {
            var content = this.$refs.content;
            var bar = this.$refs.bar;
            var totalHeight = content.scrollHeight,
                ownHeight = content.clientHeight;
            this.scrollRatio = ownHeight / totalHeight;
            // Hide scrollbar if no scrolling is possible
            if (this.scrollRatio >= 1) {
                bar.classList.add('ss-hidden')
            } else {
                bar.classList.remove('ss-hidden')
                bar.style.cssText = 'height:' + (this.scrollRatio) * 100 + '%; top:' + (content.scrollTop / totalHeight) * 100 + '%;right:-' + (this.$refs.vscroll.clientWidth - bar.clientWidth) + 'px;background-color:' + this.color + ';width:' + this.barWidth;
            }
        },
        scrolltotop() {
            this.$refs.content.scrollTop = 0;
        },
        scrolltobottom() {
            this.$refs.content.scrollTop = this.$refs.content.scrollHeight;
        }
    }
}
</script>
<style>
.ss-wrapper {
    overflow: hidden;
    width: 100%;
    height: 100%;
    position: relative;
    z-index: 1;
    float: left;
}

.ss-content {
    height: 100%;
    width: 100%;
    padding: 0 32px 0 0;
    position: relative;
    right: -18px;
    overflow: auto;
    box-sizing: border-box;
}

.ss-scroll {
    position: relative;
    background: rgba(0, 0, 0, 0.1);
    width: 9px;
    border-radius: 4px;
    top: 0;
    z-index: 2;
    cursor: pointer;
    opacity: 0;
    transition: opacity 0.25s linear;
}

.ss-hidden {
    display: none;
}

.ss-container:hover .ss-scroll,
.ss-scroll.ss-grabbed,
.ss-scroll.visible {
    opacity: 1;
}

.ss-grabbed {
    -o-user-select: none;
    -ms-user-select: none;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
}
</style>
