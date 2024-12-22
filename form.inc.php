<form id="dataForm" method="POST">
    <!-- Form untuk input data pengguna -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name"
            value="<?= isset($_SESSION['old']['name']) ? $_SESSION['old']['name'] : '' ?>"
            required>
        <div class="error" id="nameError"></div>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email"
            value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '' ?>"
            required>
        <div class="error" id="emailError"></div>
    </div>
    <div class="form-group">
        <label for="job">Job</label>
        <select id="job" name="job" required>
            <option value="">Select your job</option>
            <option
                <?= isset($_SESSION['old']['job']) && $_SESSION['old']['job'] === 'Developer' ? 'selected' : '' ?>
                value="Developer">Developer</option>
            <option
                <?= isset($_SESSION['old']['job']) && $_SESSION['old']['job'] === 'Designer' ? 'selected' : '' ?>
                value="Designer">Designer</option>
            <option
                <? isset($_SESSION['old']['job']) && $_SESSION['old']['job'] === 'Manager' ? 'selected' : '' ?>
                value="Manager">Manager</option>
            <option
                <?= isset($_SESSION['old']['job']) && $_SESSION['old']['job'] === 'Other' ? 'selected' : '' ?>
                value="Other">Other</option>
        </select>
        <div class="error" id="jobError"></div>
    </div>

    <div class="form-group">
        <label>Gender</label>
        <div class="radio">
            <input
                <?= isset($_SESSION['old']['gender']) && $_SESSION['old']['gender'] === 'Male' ? 'checked' : '' ?>
                type="radio" id="male" name="gender" value="Male" required>
            <label for="male">Male</label>
        </div>
        <div class="radio">
            <input
                <?= isset($_SESSION['old']['gender']) && $_SESSION['old']['gender'] === 'Female' ? 'checked' : '' ?>
                type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
        </div>
        <div class="error" id="genderError"></div>
    </div>

    <button style="margin-right: 1rem;" id="submitBtn" type="submit">Submit</button>
    <span id="countSubmit">jumlah submit: </span>
</form>

<script>
    const form = document.getElementById('dataForm');
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const job = document.getElementById('job');
    const submitBtn = document.getElementById('submitBtn');
    const countSubmit = document.getElementById('countSubmit');

    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const jobError = document.getElementById('jobError');

    // Fungsi untuk mendapatkan jumlah submit dari localStorage
    function getSubmitCount() {
        return localStorage.getItem('submitCount') || 0;
    }

    // Fungsi untuk menyimpan jumlah submit ke localStorage
    function setSubmitCount(count) {
        localStorage.setItem('submitCount', count);
    }

    // Fungsi untuk memperbarui jumlah submit
    function updateSubmitCount() {
        let count = parseInt(getSubmitCount());
        count++;
        setSubmitCount(count);
        countSubmit.innerText = 'jumlah submit: ' + count;
    }

    // Saat halaman dimuat, tampilkan jumlah submit
    window.onload = () => {
        let count = getSubmitCount();
        countSubmit.innerText = 'jumlah submit: ' + count;
    };

    // Validasi input nama
    name.addEventListener('keyup', () => {
        if (name.value.length < 3) {
            nameError.style.display = 'block';
            nameError.innerText = 'Name must be at least 3 characters';
        } else {
            nameError.style.display = 'none';
            nameError.innerText = '';
        }
    });

    // Validasi input email
    email.addEventListener('keyup', () => {
        if (!email.value.includes('@')) {
            emailError.style.display = 'block';
            emailError.innerText = 'Email must a valid email address';
        } else {
            emailError.style.display = 'none';
            emailError.innerText = '';
        }
    });

    // Validasi pilihan pekerjaan
    job.addEventListener('change', () => {
        if (job.value === '') {
            jobError.style.display = 'block';
            jobError.innerText = 'Job must be selected';
        } else {
            jobError.style.display = 'none';
            jobError.innerText = '';
        }
    });

    // Validasi dan submit form
    submitBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let errMessage = '';
        if (name.value === '') {
            errMessage += 'Name must be filled\n';
        }
        if (email.value === '') {
            errMessage += 'Email must be filled\n';
        }
        if (job.value === '') {
            errMessage += 'Job must be selected\n';
        }
        if (errMessage !== '') {
            alert(errMessage);
        } else {
            updateSubmitCount();
            form.submit();
        }
    });
</script>