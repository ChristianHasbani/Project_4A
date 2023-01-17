const startButton = document.getElementById("start")

startButton.addEventListener("click",BasicTest)

function BasicTest() {
    
    const irregularVerbs = {
        "be": ["was/were", "been"],
        "have": ["had", "had"],
        "do": ["did", "done"],
        "say": ["said", "said"],
        "go": ["went", "gone"],
        "get": ["got", "gotten"],
        "make": ["made", "made"],
        "know": ["knew", "known"],
        "think": ["thought", "thought"],
        "take": ["took", "taken"],
        "see": ["saw", "seen"],
        "come": ["came", "come"],
        "want": ["wanted", "wanted"],
        "give": ["gave", "given"],
        "use": ["used", "used"],
        "find": ["found", "found"],
        "tell": ["told", "told"],
        "ask": ["asked", "asked"],
        "work": ["worked", "worked"],
        "seem": ["seemed", "seemed"],
        "feel": ["felt", "felt"],
        "try": ["tried", "tried"],
        "leave": ["left", "left"],
        "call": ["called", "called"]
    };
    
    let score = 0;
    
    for (const verb in irregularVerbs) {
        const present = prompt(`Conjugate "${verb}" in the present tense:`);
        const pastSimple = prompt(`Conjugate "${verb}" in the past simple tense:`);
        const pastParticiple = prompt(`Conjugate "${verb}" in the past participle tense:`);
    
        if (present === verb && pastSimple === irregularVerbs[verb][0] && pastParticiple === irregularVerbs[verb][1]) {
        score++;
        }
    }
    
    alert(`You got ${score} out of ${Object.keys(irregularVerbs).length} correct!`);
}