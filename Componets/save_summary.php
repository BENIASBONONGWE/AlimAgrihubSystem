<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['summaryActionPlan'])) {
    $_SESSION['summaryActionPlan'] = $_POST['summaryActionPlan'];
    echo "Summary action plan saved.";
} else {
    echo "Failed to save summary action plan.";
}
?>
