<template>
    <div class="addTopic">
        <div class="ques">
            <div class="quesText">题目</div>
            <div class="quesBox">
                <textarea></textarea>
            </div>
        </div>
        <div class="point">
            <div class="pointText">解题思路/提示</div>
            <div class="pointBox">
                <textarea></textarea>
            </div>
        </div>
        <div class="point">
            <div class="pointText">答案</div>
            <div class="pointBox">
                <textarea></textarea>
            </div>
        </div>
    </div>
</template>

<script>
export default{
}

</script>

<style scoped>
    .addTopic{
        height: 84%;
        width: 100%;
    }
    .ques{
        width: 100%;
        height: 35%;
    }
    .quesText{
        width: 100%;
        height: 30%;
        font-weight: 900;
        font-size: 2em;
        display: flex;
        align-items: center;
    }
    .quesBox{
        width: 80%;
        height: 70%;
        margin-left: 10%;
        margin-right: 10%;
        border-style: solid;
        border-width: 1px;
        border-color: rgb(185, 168, 168);
    }
    .point{
        width: 100%;
        height: 30%;
        margin-top: 5%;
    }
    .pointText{
        width: 100%;
        height: 20%;
        font-weight: 900;
        font-size: 1.5em;
        display: flex;
        align-items: center;
    }
    .pointBox{
        width: 80%;
        height: 70%;
        margin-left: 10%;
        margin-right: 10%;
        border-style: solid;
        border-width: 1px;
        border-color: rgb(185, 168, 168);
    }
    textarea{
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0%;
        border: none;
    }
</style>
