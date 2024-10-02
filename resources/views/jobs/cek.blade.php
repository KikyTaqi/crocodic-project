@if(isset($jd))
    <p><strong>Job Name:</strong> {{ $jd['job_name'] ?? 'N/A' }}</p>
    <p><strong>Ad Number:</strong> {{ $jd['ads'] ?? 'N/A' }}</p>
    <p><strong>Location:</strong> {{ $jd['lokasi'] ?? 'N/A' }}</p>
    <p><strong>Logo File Name:</strong> {{ $jd['foto_name'] ?? 'N/A' }}</p>
    <p><strong>Job ID:</strong> {{ $jd['id_job'] ?? 'N/A' }}</p>
    <p><strong>Status:</strong> {{ $jd['status'] ?? 'N/A' }}</p>
@endif
