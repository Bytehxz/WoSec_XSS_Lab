document.cookie = "flag=CTF{XSS_WoSec}; path=/";
function addTask() {
	var taskInput = document.getElementById("taskInput");
	var taskList = document.getElementById("taskList");

	var taskHTML = '<div class="taskItem">' + taskInput.value + '</div>';
	taskList.innerHTML += taskHTML;

	taskInput.value = ""; // limpiar input
}

function resetTasks() {
	document.getElementById("taskList").innerHTML = "";
}

