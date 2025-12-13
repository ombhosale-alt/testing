<?php
$bodyClass = "scrolled-page";
include 'Navbar.php';
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Assignments Manager</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
    background: url("assets/images/logo/homework.jpg") no-repeat center center fixed;
    background-size: cover;
    font-family: "Segoe UI", Roboto, sans-serif;
    padding: 24px;
   
}

        :root {
            --accent1: #6c63ff;
            --accent2: #4e4cc7;
        }

        body {
            background: #f8f9fa;
            font-family: "Segoe UI", Roboto, sans-serif;
            padding: 24px;
        }

        .assignment-card {
            max-width: 920px;
            margin: 0 auto;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(50, 50, 93, 0.08);
        }

        .card-header-custom {
            background: linear-gradient(135deg, var(--accent1), var(--accent2));
            color: #fff;
            padding: 18px;
            text-align: center;
        }

        .card-body {
            padding: 18px;
        }

        .status-pending {
            color: #ff9800;
            font-weight: 600;
        }

        .status-submitted {
            color: #198754;
            font-weight: 600;
        }

        .priority-high {
            background: #ff6b6b;
            color: #fff;
        }

        .priority-medium {
            background: #ffb74d;
            color: #fff;
        }

        .priority-low {
            background: #90caf9;
            color: #fff;
        }

        .table tbody tr.fade-in {
            animation: fadeInRow 220ms ease;
        }

        @keyframes fadeInRow {
            from {
                opacity: 0;
                transform: translateY(6px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .small-muted {
            font-size: .82rem;
            color: #6c757d;
        }

        /* Dark mode support */
        body.dark {
            background: #0f1720;
            color: #e6eef8;
        }

        body.dark .card {
            background: #0b1220;
            color: #e6eef8;
        }

        body.dark .card-header-custom {
            opacity: .95;
        }

        body.dark .table {
            color: #e6eef8;
        }
         footer {
       padding: 15px;
     margin-top: 50px;
       }
    </style>
</head>

<body>



    <div class="assignment-card card">
        <div class="card-header-custom">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-file-earmark-text" style="font-size: 2.1rem;"></i>
                    <div>
                        <h4 class="mb-0">Assignments</h4>
                        <div class="small-muted">Track, submit & manage your assignments</div>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <button id="toggleTheme" class="btn btn-sm btn-light"><i class="bi bi-moon-stars"></i></button>
                    <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#addPanel">
                        <i class="bi bi-plus-lg"></i> Add
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!-- Top controls -->
            <div class="row g-2 align-items-center mb-3">
                <div class="col-md-5">
                    <input id="searchBox" class="form-control" placeholder="Search assignments...">
                </div>
                <div class="col-md-3">
                    <select id="filterStatus" class="form-select">
                        <option value="all">All statuses</option>
                        <option value="pending">Pending</option>
                        <option value="submitted">Submitted</option>
                        <option value="overdue">Overdue</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select id="filterPriority" class="form-select">
                        <option value="all">All priorities</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <div class="col-md-2 text-end">
                    <small class="small-muted">Sort by:</small>
                    <select id="sortBy" class="form-select form-select-sm d-inline-block w-auto">
                        <option value="due">Due date</option>
                        <option value="priority">Priority</option>
                        <option value="title">Title</option>
                    </select>
                </div>
            </div>

            <!-- Progress bar and stats -->
            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <div><strong id="statsText">0 / 0 completed</strong></div>
                    <div class="small-muted" id="nextDueText">No assignments</div>
                </div>
                <div class="progress" style="height:10px;">
                    <div id="progressBar" class="progress-bar" role="progressbar" style="width:0%"></div>
                </div>
            </div>

            <!-- Assignments table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Due / Countdown</th>
                            <th>Priority</th>
                            <th>Notes / File</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="assignmentList"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Offcanvas for Add / Edit -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addPanel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel">Add Assignment</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <form id="assignmentForm">
                <input type="hidden" id="editingId">
                <div class="mb-2">
                    <label class="form-label">Title</label>
                    <input id="assignmentTitle" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Due Date</label>
                    <input id="assignmentDue" type="date" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Priority</label>
                    <select id="assignmentPriority" class="form-select">
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Notes</label>
                    <textarea id="assignmentNotes" class="form-control" rows="3"
                        placeholder="Add short notes or instructions..."></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Attach File (optional)</label>
                    <input id="assignmentFile" type="file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png,.txt">
                    <div class="form-text">Files are stored locally in your browser (small files recommended).</div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Save Assignment</button>
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="offcanvas">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Toast container -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index:1200">
        <div id="toastContainer"></div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        /* -------------------------
           Data model & persistence
           ------------------------- */
        const STORAGE_KEY = 'assignments_v1';
        const REMINDER_KEY = 'assignments_reminders_v1'; // to avoid duplicate toasts
        let assignments = loadAssignments();
        let reminderShown = JSON.parse(localStorage.getItem(REMINDER_KEY) || '{}');

        /* -------------------------
           Utilities
           ------------------------- */
        function uid() { return 'id_' + Math.random().toString(36).slice(2, 9); }
        function saveAssignments() { localStorage.setItem(STORAGE_KEY, JSON.stringify(assignments)); }
        function loadAssignments() { try { return JSON.parse(localStorage.getItem(STORAGE_KEY)) || []; } catch (e) { return []; } }
        function formatDate(dStr) { if (!dStr) return '-'; const d = new Date(dStr); return d.toLocaleDateString(); }
        function daysBetween(dStr) { const now = new Date(); const d = new Date(dStr); const diff = (d - new Date(now.getFullYear(), now.getMonth(), now.getDate())) / (1000 * 60 * 60 * 24); return Math.ceil(diff); }
        function priorityBadge(p) { if (p === 'high') return '<span class="badge priority-high">High</span>'; if (p === 'low') return '<span class="badge priority-low">Low</span>'; return '<span class="badge priority-medium">Medium</span>'; }

        /* -------------------------
           Render & UI
           ------------------------- */
        const listEl = document.getElementById('assignmentList');
        const statsText = document.getElementById('statsText');
        const progressBar = document.getElementById('progressBar');
        const nextDueText = document.getElementById('nextDueText');

        function renderList() {
            // apply filters / search / sort
            const search = document.getElementById('searchBox').value.trim().toLowerCase();
            const statusFilter = document.getElementById('filterStatus').value;
            const priorityFilter = document.getElementById('filterPriority').value;
            const sortBy = document.getElementById('sortBy').value;

            let items = assignments.slice();

            // compute overdue and countdown inside items
            items.forEach(it => {
                it._daysLeft = daysBetween(it.due);
                it._isOverdue = it._daysLeft < 0 && it.status !== 'submitted';
            });

            // filters
            items = items.filter(it => {
                if (search && !it.title.toLowerCase().includes(search) && !(it.notes || '').toLowerCase().includes(search)) return false;
                if (statusFilter === 'pending' && it.status !== 'pending') return false;
                if (statusFilter === 'submitted' && it.status !== 'submitted') return false;
                if (statusFilter === 'overdue' && !it._isOverdue) return false;
                if (priorityFilter !== 'all' && it.priority !== priorityFilter) return false;
                return true;
            });

            // sort
            if (sortBy === 'due') items.sort((a, b) => new Date(a.due) - new Date(b.due));
            else if (sortBy === 'priority') items.sort((a, b) => ({ high: 0, medium: 1, low: 2 }[a.priority] - ({ high: 0, medium: 1, low: 2 }[b.priority])));
            else if (sortBy === 'title') items.sort((a, b) => a.title.localeCompare(b.title));

            // render
            listEl.innerHTML = '';
            items.forEach(it => {
                const tr = document.createElement('tr');
                tr.classList.add('fade-in');
                const daysText = it._isOverdue ? `<span class="text-danger fw-semibold">Overdue</span>` : (it._daysLeft === 0 ? `<span class="text-warning fw-semibold">Due today</span>` : `<small class="small-muted">${it._daysLeft} day(s) left</small>`);
                const fileHtml = it.fileName ? `<div><a href="${it.fileData}" download="${it.fileName}" class="d-block text-truncate" style="max-width:160px;">📎 ${it.fileName}</a></div>` : '<div class="small-muted">—</div>';
                const notesHtml = it.notes ? `<div class="small-muted" style="max-width:200px">${it.notes}</div>` : '';
                tr.innerHTML = `
      <td>
        <div><strong>${escapeHtml(it.title)}</strong></div>
        <div class="small-muted">${formatDate(it.due)}</div>
      </td>
      <td>${formatDate(it.due)}<div>${daysText}</div></td>
      <td>${priorityBadge(it.priority)}</td>
      <td>${notesHtml}${fileHtml}</td>
      <td>${it.status === 'submitted' ? '<span class="status-submitted">Submitted</span>' : '<span class="status-pending">Pending</span>'}</td>
      <td class="text-end">
        <div class="btn-group btn-group-sm" role="group">
          <button class="btn btn-success" onclick="markSubmitted('${it.id}')" ${it.status === 'submitted' ? 'disabled' : ''} title="Mark as submitted"><i class="bi bi-check-lg"></i></button>
          <button class="btn btn-outline-primary" onclick="openEdit('${it.id}')" title="Edit"><i class="bi bi-pencil"></i></button>
          <button class="btn btn-outline-danger" onclick="deleteAssignment('${it.id}')" title="Delete"><i class="bi bi-trash"></i></button>
        </div>
      </td>
    `;
                listEl.appendChild(tr);
            });

            updateStats();
        }

        /* safe escape */
        function escapeHtml(s) { return (s || '').replaceAll('&', '&amp;').replaceAll('<', '&lt;').replaceAll('>', '&gt;'); }

        /* -------------------------
           Stats & progress
           ------------------------- */
        function updateStats() {
            const total = assignments.length;
            const completed = assignments.filter(a => a.status === 'submitted').length;
            statsText.textContent = `${completed} / ${total} completed`;
            const pct = total === 0 ? 0 : Math.round((completed / total) * 100);
            progressBar.style.width = pct + '%';
            progressBar.textContent = pct ? pct + '%' : '';

            // next due
            const pending = assignments.filter(a => a.status !== 'submitted').sort((a, b) => new Date(a.due) - new Date(b.due));
            if (pending.length === 0) nextDueText.textContent = 'No pending assignments';
            else {
                const n = pending[0];
                nextDueText.textContent = `Next: ${n.title} — ${daysBetween(n.due)} day(s)`;
            }
        }

        /* -------------------------
           CRUD actions
           ------------------------- */
        function addAssignmentObj(obj) {
            assignments.push(obj); saveAssignments(); renderList();
        }

        function markSubmitted(id) {
            const a = assignments.find(x => x.id === id);
            if (!a) return;
            a.status = 'submitted';
            saveAssignments(); renderList();
        }

        function deleteAssignment(id) {
            if (!confirm('Delete this assignment?')) return;
            assignments = assignments.filter(x => x.id !== id); saveAssignments(); renderList();
        }

        /* -------------------------
           Edit / Add UI
           ------------------------- */
        const offcanvasEl = document.getElementById('addPanel');
        const offcanvas = new bootstrap.Offcanvas(offcanvasEl);

        document.getElementById('assignmentForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const id = document.getElementById('editingId').value;
            const title = document.getElementById('assignmentTitle').value.trim();
            const due = document.getElementById('assignmentDue').value;
            const priority = document.getElementById('assignmentPriority').value;
            const notes = document.getElementById('assignmentNotes').value.trim();
            const fileInput = document.getElementById('assignmentFile');

            // handle file: read as dataURL (warning: can be large)
            let fileName = null, fileData = null;
            if (fileInput.files && fileInput.files[0]) {
                const f = fileInput.files[0];
                fileName = f.name;
                fileData = await readFileAsDataURL(f);
            }

            if (id) { // edit
                const a = assignments.find(x => x.id === id);
                if (!a) return;
                a.title = title; a.due = due; a.priority = priority; a.notes = notes;
                if (fileName) { a.fileName = fileName; a.fileData = fileData; }
                saveAssignments(); renderList(); offcanvas.hide();
            } else { // new
                const obj = { id: uid(), title, due, priority, notes, status: 'pending', fileName: fileName || null, fileData: fileData || null, createdAt: new Date().toISOString() };
                addAssignmentObj(obj);
                offcanvas.hide();
            }

            // reset form
            this.reset();
            document.getElementById('editingId').value = '';
        });

        /* open edit panel */
        function openEdit(id) {
            const a = assignments.find(x => x.id === id);
            if (!a) return;
            document.getElementById('editingId').value = a.id;
            document.getElementById('assignmentTitle').value = a.title;
            document.getElementById('assignmentDue').value = a.due;
            document.getElementById('assignmentPriority').value = a.priority;
            document.getElementById('assignmentNotes').value = a.notes || '';
            // file input cannot be prefilled for security; leave as-is
            offcanvas.show();
            document.querySelector('#addPanel .offcanvas-title').textContent = 'Edit Assignment';
        }

        /* helper to show add panel empty */
        document.querySelector('[data-bs-target="#addPanel"]').addEventListener('click', () => {
            document.getElementById('editingId').value = '';
            document.getElementById('assignmentForm').reset();
            document.querySelector('#addPanel .offcanvas-title').textContent = 'Add Assignment';
        });

        /* file reader */
        function readFileAsDataURL(file) {
            return new Promise((res, rej) => {
                const r = new FileReader();
                r.onload = () => res(r.result);
                r.onerror = () => rej(new Error('File read error'));
                r.readAsDataURL(file);
            });
        }

        /* -------------------------
           Search / Filter / Sort events
           ------------------------- */
        ['searchBox', 'filterStatus', 'filterPriority', 'sortBy'].forEach(id => {
            document.getElementById(id).addEventListener('input', renderList);
        });

        /* -------------------------
           Periodic updates & reminders
           ------------------------- */
        function checkReminders() {
            // show toast for assignments with 1 day left & not yet reminded
            const nowKey = new Date().toISOString().slice(0, 10);
            assignments.forEach(a => {
                if (a.status === 'submitted') return;
                const days = daysBetween(a.due);
                if (days <= 1 && days >= 0) {
                    if (!reminderShown[a.id]) {
                        showToast(`Reminder: "${a.title}" is due ${days === 0 ? 'today' : 'tomorrow'}`);
                        reminderShown[a.id] = true;
                    }
                }
            });
            localStorage.setItem(REMINDER_KEY, JSON.stringify(reminderShown));
        }

        /* show bootstrap toast */
        function showToast(message) {
            const tId = 'toast_' + Math.random().toString(36).slice(2, 9);
            const cont = document.getElementById('toastContainer');
            const toastHtml = document.createElement('div');
            toastHtml.innerHTML = `
    <div id="${tId}" class="toast align-items-center text-bg-light border" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">${escapeHtml(message)}</div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    </div>`;
            cont.appendChild(toastHtml);
            const bToast = new bootstrap.Toast(document.getElementById(tId), { delay: 7000 });
            bToast.show();
            // remove after hidden
            document.getElementById(tId).addEventListener('hidden.bs.toast', () => toastHtml.remove());
        }

        /* update countdowns every minute */
        setInterval(() => {
            renderList();
            checkReminders();
        }, 60 * 1000);

        /* initial run */
        renderList();
        checkReminders();

        /* -------------------------
           Theme toggle
           ------------------------- */
        const themeBtn = document.getElementById('toggleTheme');
        themeBtn.addEventListener('click', () => {
            document.body.classList.toggle('dark');
            themeBtn.innerHTML = document.body.classList.contains('dark') ? '<i class="bi bi-sun-fill"></i>' : '<i class="bi bi-moon-stars"></i>';
        });

        /* helper: open Edit from code when clicking edit btn elsewhere */
        window.openEdit = openEdit;

        /* helper functions for actions from generated html */
        window.markSubmitted = (id) => { markSubmitted(id); };
        window.deleteAssignment = (id) => { deleteAssignment(id); };

        /* Small initial demo items (only if none exist) */
        if (assignments.length === 0) {
            const demo = [
                { id: uid(), title: 'Math Homework', due: new Date(Date.now() + 2 * 24 * 3600 * 1000).toISOString().slice(0, 10), priority: 'high', notes: 'Chapters 4-5', status: 'pending', fileName: null, fileData: null },
                { id: uid(), title: 'Science Report', due: new Date(Date.now() + 5 * 24 * 3600 * 1000).toISOString().slice(0, 10), priority: 'medium', notes: 'Group project', status: 'pending', fileName: null, fileData: null },
                { id: uid(), title: 'History Essay', due: new Date(Date.now() - 1 * 24 * 3600 * 1000).toISOString().slice(0, 10), priority: 'low', notes: '500 words', status: 'submitted', fileName: null, fileData: null }
            ];
            assignments = demo; saveAssignments(); renderList();
        }

        /* expose render for debugging if needed */
        window.renderList = renderList;

    </script>

</body>

</html>

<?php include('Footer.php') ?>