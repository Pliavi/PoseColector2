import Vue from 'vue'
import Draggable from 'draggable'
import BodyPart from './components/body-part'

var app = new Vue({
    el: '#app',
    data: {
        "action": null,
        "positions":{
            "head" : {x: null, y: null},
            "neck" : {x: null, y: null},
            "shoulder_left" : {x: null, y: null},
            "shoulder_right" : {x: null, y: null},
            "elbow_left" : {x: null, y: null},
            "elbow_right" : {x: null, y: null},
            "hand_left" : {x: null, y: null},
            "hand_right" : {x: null, y: null},
            "torso" : {x: null, y: null},
            "hip_left" : {x: null, y: null},
            "hip_right" : {x: null, y: null},
            "knee_left" : {x: null, y: null},
            "knee_right" : {x: null, y: null},
            "foot_left" : {x: null, y: null},
            "foot_right" : {x: null, y: null}
        }
    },
    methods:{
        setAction($value){
            this.$data.action = $value;
        },
        onSubmit(el){
            let arr = Object.keys(this.$data.positions).map(function (key) { console.log(this.$data.positions);return this.$data.positions[key]; }, this);

            for (var index = 0; index < arr.length; index++) {
                var element = arr[index];
                if(element.length == 0){
                    alert("Movimente todos os pontos!");
                    return false;
                }
            }

            el.target.submit()
        }
    },
    components: { BodyPart }
});

// DRAGABLE
let optionsFactory = {
    limit: dragbound,  
    onDragStart: function(el){ el.style.cursor = 'none' },
    onDragEnd: function (el) {
        el.style.cursor = 'initial'
        let coord = draggables[el.id].get()
        app.$data.positions[el.id].x = coord.x 
        app.$data.positions[el.id].y = coord.y
    }
}

for(let i = 0; i < elements.length; i++){
    let element = elements[i]
    let options = optionsFactory
    draggables[element.id] = new Draggable (element, options)
}