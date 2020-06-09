<?php
// Single Responsibility Principle Violation
class Report {

    public function getTitle() {
        return 'Report Title';
    }

    public function getDate() {
        return '06-09-2020';
    }

    public function getContents() {
        return [
            'title' => $this->getTitle(),
            'date'  => $this->getDate(),
        ];
    }

    public function formatJson() {
        return json_encode($this->getContents());
    }
}

// Refactored code
interface ReportFormattable {
    public function format(Report $report);
}

class JsonReportFormatter implements ReportFormattable {
    public function format(Report $report) {
        return json_encode($report->getContents());
    }
}
class Report {
    public function getTitle() {
        return 'Report Title';
    }

    public function getDate() {
        return '06-09-2020';
    }

    public function getContents() {
        return [
            'title' => $this->getTitle(),
            'date'  => $this->getDate(),
        ];
    }

}

$json = new JsonReportFormatter;
echo $json->format(new Report);
?>